<?php
$title = 'Mot de passe oublié';
session_start();
include('inc/pdo.php');
include('inc/function.php');

$success = false;
$errors = array();
?>
<section>
  <img src="asset/img/hugologonb.png" class="logo-fixed">
</section>
<?php

//Verification eMail
if (!empty($_GET['email'])) {
  $email = cleanXss($_GET['email']);
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "SELECT * FROM vl_users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
  } else {
    header('location: login.php?error=yes');
  }
} else {
    header('location: admin/403.php');
}

if (!empty($_POST['submitted'])) {

  //Verification que l'email et le token n'ont pas été modifié

  if (!empty($_GET['email']) && !empty($_GET['token'])) {
    $email = cleanXss($_GET['email']);
    $token = cleanXss($_GET['token']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql = "SELECT * FROM vl_users WHERE email = :email AND token = :token";
      $query = $pdo->prepare($sql);
      $query -> bindValue(':email', $email, PDO::PARAM_STR);
      $query -> bindValue(':token', $token, PDO::PARAM_STR);
      $query->execute();
      $user = $query->fetch();
      if (!empty($user)) {
        $password = cleanXss($_POST['password']);
        $confirmPassword = cleanXss($_POST['confirm-password']);
        if (!empty($password) && !empty($confirmPassword)) {
          if (mb_strlen($password) < 6) {
            $errors['password'] = 'Veuillez renseigner au minimum 6 caractères';
          } elseif ($confirmPassword != $password) {
            $errors['confirm-password'] = 'Les mots de passe ne correspondent pas';
          }
        } else {
          $errors['password'] = 'Veuillez renseigner ce/ces champs';
        }
        if (count($errors) == 0) {
          if ($token == $user['token']) {
            if (isActual($user['token_at'])) {
              $sql = "SELECT * FROM vl_users WHERE email = :email AND token = :token";
              $query = $pdo->prepare($sql);
              $query->bindValue(':email',$email,PDO::PARAM_STR);
              $query->bindValue(':token',$token,PDO::PARAM_STR);
              $query->execute();
              $user = $query->fetch();
              if (!empty($user)) {
                $passhash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE vl_users SET password = :passhash, token = ''  WHERE ID = :id AND email = :email";
                $query = $pdo->prepare($sql);
                $query->bindValue(':passhash',$passhash,PDO::PARAM_STR);
                $query->bindValue(':id',$id,PDO::PARAM_INT);
                $query->bindValue(':email',$email,PDO::PARAM_STR);
                $query->execute();

                header('location: login.php?success=yes');
              }
            } else {
              header('location: login.php?token=off');
            }
          } else {
            header('location: login.php?error=yes');
          }
        }

      } else {
        header('location: login.php?error=yes');
      }
    } else {
      header('location: login.php?error=yes');
    }
  } else {
      header('location: admin/403.php');
  }

}


include('inc/header-front.php');
?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <?php header('Location: index.php'); ?>

<?php endif; ?>

<?php if ($_GET['form'] == 'no'): ?>
    <div class="resetMail">
      <h1>Mail de : Vaccin'Line (vaccin-line@gmail.com)</h1>
      <h2>Objet : Réinitialisation de mot de passe</h2>
      <p>Bonjour <?php echo mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']); ?>,<br><br>
        Un utilisateur a demandé un nouveau mot de passe pour le compte suivant sur VACCIN'LINE :<br><br>
        Identifiant : <?php echo $user['email'] ?><br><br>
        Si vous n'êtes pas l'auteur de cette demande, ignorez simplement cet e-mail.<br><br>
        Pour continuer :<br><br>
        <a href="reset-password.php?form=yes&email=<?php echo $user['email']; ?>&token=<?php echo $user['token'] ?>">Cliquez ici pour réinitialiser votre mot de passe</a><br><br>
        Merci de votre attention.
      </p>
    </div>
<?php else: ?>
  <section id="login">
    <div class="wrap-section-connexion-1">
      <div class="form-login">
        <h2>Nouveau mot de passe</h2>
        <form action="reset-password.php?form=yes&email=<?php echo $_GET['email']; ?>&token=<?php echo $_GET['token'] ?>" method="post">
          <div class="w50">
            <input type="password" name="password" required>
            <span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; } ?></span>
            <label>Nouveau mot de passe</label>
          </div>
          <div class="w50">
            <input type="password" name="confirm-password" required>
            <label>Confirmation</label>
          </div>
          <div class="w50">
            <input type="submit" name="submitted" value="Envoyer">
          </div>
        </form>
      </div>
    </div>
  </section>
<?php endif; ?>


<!-- Mode MDP oublier  -->
<?php
include('inc/mini-footer-front.php');

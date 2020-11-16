<?php
$title = 'Mot de passe oublié';
session_start();
include('inc/pdo.php');
include('inc/function.php');

if (empty($_GET['id'])) {
  //header('location: admin/403.php');
}


$success = false;
$errors = array();

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $user = $query->fetch();
}

if (!empty($_POST['submitted'])) {

  //Verification XSS
  $email = cleanXss($_GET['email']);
  $id = cleanXss($_GET['id']);
  $token = cleanXss($_GET['token']);

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
    if ($_GET['token'] == $user['token']) {
      if (isActual($user['token_at'])) {
        $sql = "SELECT * FROM vl_users WHERE email = :email AND id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->bindValue(':id',$id,PDO::PARAM_STR);
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

}


include('inc/header-front.php');
?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <?php header('Location: index.php'); ?>

<?php endif; ?>

<?php if ($_GET['form'] == 'no'): ?>
    <div class="stats2">
      <h1>Mail de : Vaccin'Line (vaccin-line@gmail.com)</h1>
      <h2>Objet : Réinitialisation de mot de passe</h2>
      <p>Bonjour <?php echo mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']); ?>,<br><br>
        Un utilisateur a demandé un nouveau mot de passe pour le compte suivant sur VACCIN'LINE :<br><br>
        identifiant : <?php echo $user['email'] ?><br><br>
        Si vous n'etes pas l'auteur de cette demande, ignorez simplement et e-mail.<br><br>
        Pour continuer :<br><br>
        <a href="reset-password.php?form=yes&email=<?php echo $user['email']; ?>&id=<?php echo $user['id'] ?>&token=<?php echo $user['token'] ?>">Cliquez ici pour réinitialiser votre mot de passe</a><br><br>
        Merci de votre attention.
      </p>
    </div>
<?php else: ?>
  <section id="login">
    <div class="wrap-section-connexion-1">
      <div class="form-login">
        <h2>Nouveau mot de passe</h2>
        <form action="reset-password.php?email=<?php echo $_GET['email']; ?>&id=<?php echo $_GET['id'] ?>&token=<?php echo $_GET['token'] ?>" method="post">
          <div class="w50">
            <input type="password" name="password" placeholder="Nouveau mot de passe" value="<?php if(!empty($_POST['password'])) { echo $_POST['password']; } ?>">
            <span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; } ?></span>
          </div>
          <div class="w50">
            <input type="password" name="confirm-password" placeholder="Confirmation" value="<?php if(!empty($_POST['confirm-password'])) { echo $_POST['confirm-password']; } ?>">
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
include('inc/footer-front.php');

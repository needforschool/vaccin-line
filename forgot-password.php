<?php
$title = 'Mot de passe oublié';
session_start();
include('inc/pdo.php');
include('inc/function.php');


$success = false;
$errors = array();

if (!empty($_POST['submitted'])) {

  //Verification faille XSS
  $email = cleanXss($_POST['email']);

  //Verification eMail
  if (!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Veuillez renseigner un email valide';
    }
  }else {
    $errors['email'] = 'Veuillez renseigner un email';
  }

  if (count($errors) == 0) {
    $sql = "SELECT * FROM vl_users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    if (!empty($user)) {
      $token = generateRandomString(80);
      $sql = "UPDATE vl_users SET token = :token, token_at = NOW() WHERE id = :id";
      $query = $pdo->prepare($sql);
      $query->bindValue(':token',$token,PDO::PARAM_STR);
      $query->bindValue(':id',$user['id'],PDO::PARAM_STR);
      $query->execute();

      header('location: reset-password.php?id='. $user['id'] .'&form=no');
    } else{
      $errors ['email'] = 'l\'email de correspond pas';
    }
  }

}
include('inc/header-front.php');
?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <?php header('Location: index.php'); ?>

<?php endif; ?>

<!-- Mode CONNEXION  -->
<?php if(empty($_SESSION)) : ?>
  <section id="resetPassword">
    <div class="wrap-section-connexion-1">
      <div class="form-login">
        <h2>mot de passe oublié ?</h2>
        <form action="forgot-password.php" method="post">
          <div class="w50">
            <input type="email" name="email" required="" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
            <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>
            <label>Email</label>
          </div>
          <a href="login.php">Retour</a>
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

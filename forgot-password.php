<?php
$title = 'Mot de passe oublié';
session_start();
include('inc/pdo.php');
include('inc/function.php');

include('inc/header-front.php');

$success = false;
$errors = array();

if (!empty($_POST['submitted'])) {
}

?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <?php header('Location: index.php'); ?>

<?php endif; ?>

<!-- Mode CONNEXION  -->
<?php if(empty($_SESSION)) : ?>
  <section id="login">
    <div class="wrap-section-connexion-1">
      <div class="form-login">
        <h2>mot de passe oublié ?</h2>
        <form action="login.php" method="post">
          <div class="w50">
            <input type="email" name="email" required="" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
            <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>
            <label>Email</label>
          </div>
          <a href="login.php">Retour</a>
          <div class="w50">
            <input type="submit" name="submitted" value="Login">
          </div>
        </form>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Mode MDP oublier  -->
<?php
include('inc/footer-front.php');

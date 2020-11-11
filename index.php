<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
<<<<<<< HEAD
=======
debug($_SESSION);
>>>>>>> f5b41c13a3a523f449c61cec0f3cb11fe5a4a9dc

include('inc/header-front.php');

?>

</script>
<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
<section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>the science of <br>feeling better</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a href="#">book a visit</a>
      </div>
      <div class="button">
        <div class="effect">
          <!-- effect btn -->
          <a href="#"  class="btn_inscription">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            inscription
          </a>
        </div>
        <div class="effect">
          <!-- effect btn -->
          <a href="#"  class="btn_connexion">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            connexion
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <section>
    <p>bonjour <?php echo $_SESSION['user']['prenom']; ?></p>
    
  </section>

<?php endif; ?>
<?php include('inc/footer-front.php');

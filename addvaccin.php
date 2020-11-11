<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
debug($_SESSION);

include('inc/header-front.php');

?>

</script>
<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
    die('error 404');
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <section>
    <p>bonjour <?php echo $_SESSION['user']['prenom']; ?></p>
    
  </section>

<?php endif; ?>
<?php include('inc/footer-front.php');
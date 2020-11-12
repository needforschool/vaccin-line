<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
// debug($_SESSION);
// debug($_SESSION);

include('inc/header-front.php');

?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
    <!-- ERROR 403  -->
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>
    debug($_SESSION);
<?php endif; ?>
<?php include('inc/footer-front.php');

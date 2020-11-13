<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
// debug($_SESSION);
// debug($_SESSION);

include('inc/header-front.php');

?>
<form action="contact.php" method="post">
    <div class="w50">
        <input type="email" name="email" require=""value="" placeholder="Votre email">
    </div>
    <div class="w50">
        <input type="text" name="objet" require=""value="" placeholder="Objet">
    </div>
    <div class="w50">
        <textarea name="message" id="" cols="50" rows="8" placeholder="Votre message..."></textarea>
    </div>
    <div class="w50">
          <input type="submit" name="submitted" value="Envoyer">
    </div>
</form>

<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
    <!-- ERROR 403  -->
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>
    debug($_SESSION);
<?php endif; ?>
<?php include('inc/footer-front.php');

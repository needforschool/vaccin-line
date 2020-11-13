<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

// debug($_SESSION);
// debug($_SESSION);
$succes = false;

include('inc/header-front.php');

?>

<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
  <?php if($succes == false) : ?>
      <section>
        <div class="wrap-section-contact-1">
          <div class="wrap-section-contact-2">
            <h2>Contact</h2>
            <form action="contact.php" method="post">
              <div class="w50">
                <input type="email" name="email"<?php if (!empty($_SESSION)) { echo 'value="'. $_SESSION['user']['email'] .'"';}?>>
                <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>
                <label>Email</label>
              </div>
              <div class="w50">
                <input type="text" name="object" required="">
                <span class="error"><?php if(!empty($errors['object'])) { echo $errors['object']; }?></span>
                <label>Objet</label>
              </div>
              <div class="w50">
                <textarea name="message" id="message" cols="55" rows="10" ></textarea>
                <span class="error"><?php if(!empty($errors['message'])) { echo $errors['message']; }?></span>
                <label>Message</label>
              </div>
              <div class="w50">
                <input type="submit" name="submitted" value="Envoyer">
              </div>
            </form>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php if($succes == true) : ?>
        <p>Merci, Votre message a bien etait pris en compte</p>
        <a href="index.php">Retour a mon carnet</a>
    <?php endif; ?>
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

    debug($_SESSION);

    <?php if($succes == false) : ?>
      <section>
        <div class="wrap-section-contact-1">
          <div class="wrap-section-contact-2">
            <h2>Contact</h2>
            <form action="contact.php" method="post">
              <div class="w50">
                <input type="email" name="email"<?php if (!empty($_SESSION)) { echo 'value="'. $_SESSION['user']['email'] .'"';}?> readonly>
                <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>
                <label>Email</label>
              </div>
              <div class="w50">
                <input type="text" name="object" required="">
                <span class="error"><?php if(!empty($errors['object'])) { echo $errors['object']; }?></span>
                <label>Objet</label>
              </div>
              <div class="w50">
                <textarea name="message" id="message" cols="55" rows="10" ></textarea>
                <span class="error"><?php if(!empty($errors['message'])) { echo $errors['message']; }?></span>
                <label>Message</label>
              </div>
              <div class="w50">
                <input type="submit" name="submitted" value="Envoyer">
              </div>
            </form>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php if($succes == true) : ?>
        <p>Merci, Votre message a bien etait pris en compte</p>
        <a href="index.php">Retour a mon carnet</a>
    <?php endif; ?>

<?php endif; ?>
<?php include('inc/footer-front.php');

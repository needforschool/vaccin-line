<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vaccin'Line</title>
  <link rel="stylesheet" href="asset/css/style-front.css">   
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</head>
<body>

  <div id="sideNav">
    <nav>
      <ul>
        <?php if(empty($_SESSION)) : ?>
          <?php if($title == 'Home') : ?>
            <li><a href="#banner" class="title">ACCEUIL</a></li>
            <li><a href="signin.php">INSCRIPTION</a></li>
            <li><a href="login.php">CONNEXION</a></li>
            <li><a href="#feature" class="title">FONCTIONNALITE</a></li>
            <li><a href="#service" class="title">SERVICES</a></li>
            <li><a href="#testimonial" class="title">TEMOIGNAGES</a></li>
            <li><a href="#footer" class="title">NOUS CONTACTER</a></li>
          <?php endif; ?>
          <?php if($title == 'Contact') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="signin.php">INSCRIPTION</a></li>
            <li><a href="login.php">CONNEXION</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
          <?php endif; ?>
          <?php if($title == 'Mentions légales') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="signin.php">INSCRIPTION</a></li>
            <li><a href="login.php">CONNEXION</a></li>
            <li><a href="contact.php" class="title">CONTACT</a></li>
          <?php endif; ?>
          <?php if($title == 'Inscription') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="login.php">CONNEXION</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
            <li><a href="contact.php" class="title">CONTACT</a></li>
          <?php endif; ?>
          <?php if($title == 'Connexion') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="signin.php">INSCRIPTION</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          <?php endif; ?>
          <?php if($title == 'Mot de passe oublié') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="signin.php">INSCRIPTION</a></li>
            <li><a href="login.php">CONNEXION</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
            <li><a href="contact.php">CONTACT</a></li>
          <?php endif; ?>
        <?php endif; ?>
        <!-- Si connecter -->
        <?php if(!empty($_SESSION)) : ?>
          <?php if($title == 'Mon carnet') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="contact.php" class="title">CONTACT</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
          <?php endif; ?>
          <?php if($title == 'Home') : ?>
            <li><a href="carnet.php" class="title">MON CARNET</a></li>
            <li><a href="contact.php" class="title">CONTACT</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
          <?php endif; ?>
          <?php if($title == 'Contact') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="carnet.php">MON CARNET</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
          <?php endif; ?>
          <?php if($title == 'Mentions légales') : ?>
            <li><a href="index.php" class="title">ACCEUIL</a></li>
            <li><a href="carnet.php">mon Carnet</a></li>
            <li><a href="propos.php">À PROPOS</a></li>
          <?php endif; ?>
          <?php if($_SESSION['user']['role'] == 'role_admin') : ?>
            <li><a href="admin/index.php">admin</a></li>
          <?php endif; ?>
          <div class="badge_container">
            <div class="badge">
              <?php
                if ($_SESSION['user']['age'] > 18)  {
                  switch ($_SESSION['user']['civilite']) {
                    case "monsieur" :
                      echo '<a href="settings.php"><img src="asset/img/undraw_profile_2.svg" alt="" width="63px"><p class="nomPrenom"></a>' . 'M.';
                      break;
                    case "madame" :
                      echo '<a href="settings.php"><img src="asset/img/undraw_profile_1.svg" alt="" width="63px"><p class="nomPrenom"></a>' .'Mme.';
                    break;
                  }
                } else {
                  echo '<a href="settings.php"><img src="asset/img/undraw_profile_3.svg" alt="" width="63px"></a>';
                } 
                echo  $_SESSION['user']['nom'] . ' '. $_SESSION['user']['prenom'] . '</p>';
              ?>
              <div class="in-out">
                <a href="logout.php"><img src="asset/img/sign-out-alt-solid.svg" alt="" srcset="" width="25px"></a>
              </div>  
            </div>
          </div>
          <?php endif; ?>
      </ul>
    </nav>
  </div>

  <div id="menuBtn">
    <img src="asset/img/menu.png" id="menu">
  </div>
        <!-- formulaire de connexion -->




  <div class="container">

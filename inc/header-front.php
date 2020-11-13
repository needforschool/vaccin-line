<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/css/style-front.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">
  <link rel="icon" type="image/svg+xml" href="book-medical-solid.svg">
  <title><?php echo $title ?></title>
  <script src="https://kit.fontawesome.com/4bb9b339d3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <div class="wrap-header">
        <div class="logo-header">
          <a href="#"><div class="logo"></div></a>
        </div>
        <div class="nav">
          <nav>
            <ul class="navbar">
              <!-- lien header  -->
              <!-- Si non connecter -->
              <?php if(empty($_SESSION)) : ?>
                <li><a href="index.php">home</a></li>
                <li><a href="signin.php">inscription</a></li>
                <li><a href="login.php">connexion</a></li>
                <li><a href="contact.php">contact</a></li>
              <?php endif; ?>
              <!-- Si connecter -->
              <?php if(!empty($_SESSION)) : ?>
                <?php if($title == 'Mon carnet') : ?>
                  <li><a href="index.php">home</a></li>
                  <li><a href="contact.php">contact</a></li>
                <?php endif; ?>
                <?php if($title == 'Home') : ?>
                  <li><a href="carnet.php">mon Carnet</a></li>
                  <li><a href="contact.php">contact</a></li>
                <?php endif; ?>

              <?php endif; ?>
                <li><a href="admin/index.php">admin</a></li>
            </ul>
          </nav>
        </div>
        <!-- formulaire de connexion -->

        <!-- Si non connecter -->
        <?php if(empty($_SESSION)) : ?>

        <?php endif; ?>
        <!-- Si connecter  -->
        <?php if(!empty($_SESSION)) : ?>
          <?php
            if ($_SESSION['user']['age'] > 18)  {
              switch ($_SESSION['user']['civilite']) {
                case "monsieur" :
                  echo '<img src="asset/img/undraw_profile_2.svg" alt="" width="50px"> ';
                  echo  '<p class="nomPrenom">' . 'M.';
                  break;
                case "madame" :
                  echo '<img src="asset/img/undraw_profile_1.svg" alt="" width="50px">';
                  echo '<p>' .'Mme.';
                break;
              }
            } else {
              echo '<img src="asset/img/undraw_profile_3.svg" alt="" width="50px">';
            }
          echo  $_SESSION['user']['nom'] . ' '. $_SESSION['user']['prenom'] . '</p>';
          ?>
          <a href="logout.php"><img src="asset/img/sign-out-alt-solid.svg" alt="" srcset="" width="30px"></a>
          <a href="settings.php"><img src="asset/img/sliders-h-solid.svg" alt="" srcset="" width="30px"></a>
          <!-- <img src="asset/img/test/undraw_profile_1.svg" alt="" width="100px">
          <img src="asset/img/test/undraw_profile_2.svg" alt="" width="100px">
          <img src="asset/img/test/undraw_profile_3.svg" alt="" width="100px"> -->
        <?php endif; ?>
      </div>
    </header>

    <div class="container">

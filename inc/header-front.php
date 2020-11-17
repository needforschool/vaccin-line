<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vaccin'Line</title>
  <?php if (!empty($_SESSION)) : ?>
    <?php if ($_SESSION['settings']['jour_nuit'] == 'jour') : ?>
      <link rel="stylesheet" href="asset/css/style-front.css">
    <?php elseif ($_SESSION['settings']['jour_nuit'] == 'nuit') : ?>
      <link rel="stylesheet" href="asset/css/style-front-nuit.css">
    <?php endif; ?>
  <?php endif; ?>
  <?php if (empty($_SESSION)) : ?>
    <link rel="stylesheet" href="asset/css/style-front.css">   
  <?php endif; ?>

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
            <li><a href="#banner" class="title">accueil</a></li>
            <li><a href="signin.php">inscription</a></li>
            <li><a href="login.php">connexion</a></li>
            <li><a href="#feature" class="title">fonctionnalités</a></li>
            <li><a href="#service" class="title">services</a></li>
            <li><a href="#testimonial" class="title">témoignages</a></li>
            <li><a href="#footer" class="title">nous contacter</a></li>
          <?php endif; ?>
          <?php if($title == 'Contact') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="signin.php">inscription</a></li>
            <li><a href="login.php">connexion</a></li>
            <li><a href="propos.php">à propos</a></li>
          <?php endif; ?>
          <?php if($title == 'Mentions légales') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="signin.php">inscription</a></li>
            <li><a href="login.php">connexion</a></li>
            <li><a href="contact.php" class="title">contact</a></li>
          <?php endif; ?>
          <?php if($title == 'Inscription') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="login.php">connexion</a></li>
            <li><a href="propos.php">à propos</a></li>
            <li><a href="contact.php" class="title">contact</a></li>
          <?php endif; ?>
          <?php if($title == 'Connexion') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="signin.php">inscription</a></li>
            <li><a href="propos.php">à propos</a></li>
            <li><a href="contact.php">contact</a></li>
          <?php endif; ?>
        <?php endif; ?>
        <!-- Si connecter -->
        <?php if(!empty($_SESSION)) : ?>
          <?php if($title == 'Mon carnet') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="contact.php" class="title">contact</a></li>
            <li><a href="propos.php">à propos</a></li>
          <?php endif; ?>
          <?php if($title == 'Home') : ?>
            <li><a href="carnet.php" class="title">mon carnet</a></li>
            <li><a href="contact.php" class="title">contact</a></li>
            <li><a href="propos.php">à propos</a></li>
          <?php endif; ?>
          <?php if($title == 'Contact') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="carnet.php">mon Carnet</a></li>
            <li><a href="propos.php">à propos</a></li>
          <?php endif; ?>
          <?php if($title == 'Mentions légales') : ?>
            <li><a href="index.php" class="title">acceuil</a></li>
            <li><a href="carnet.php">mon Carnet</a></li>
            <li><a href="propos.php">à propos</a></li>
          <?php endif; ?>
          <?php if($_SESSION['user']['role'] == 'role_admin') : ?>
            <li><a href="admin/index.php">admin</a></li>
          <?php endif; ?>

        <?php endif; ?>
      </ul>
    </nav>
  </div>

  <div id="menuBtn">
    <img src="asset/img/menu.png" id="menu">
  </div>



        <!-- formulaire de connexion -->




    <div class="container">

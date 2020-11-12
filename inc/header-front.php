<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asset/css/style-front.css">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
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
              
              <?php if(empty($_SESSION)) : ?>
                <li><a href="index.php">home</a></li>
                <li><a href="signin.php">inscription</a></li>
                <li><a href="login.php">connexion</a></li>
              <?php endif; ?>
              <?php if(!empty($_SESSION)) : ?>
              <li><a href="index.php">Mon Carnet</a></li>
              <li><a href="logout.php">déconnexion</a></li>
              <?php endif; ?>
              <li><a href="admin/index.php">admin</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
  
    <div class="container">

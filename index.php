<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

$errors = array();

include('inc/header-front.php');

?>


<!-- Non connecté -->
<section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>Comment utiliser notre carnet ?</h1>
        <p>Le carnet de vaccination est un carnet dans lequel sont notées toutes les vaccinations d’une personne. Ce carnet est très <strong class="very-important-word">pratique</strong> : il vous permet de savoir quelles vaccinations vous avez reçues et si vous êtes à jour. Il vous suffit donc de vous connecter et ne pas oublier de le présenter au professionnel de santé à chaque fois que vous vous faites vacciner. Il est valable toute la vie ! Pour l’obtenir, il suffit de vous <a class="signin.php"><strong>inscrire</strong></a>. Il est <strong class="very-important-word">gratuit</strong>.</p>
      </div>
    </div>
    <div class="bigbox2">
      <div class="stats2">
        <h1>Notre carnet est-il sécurisé ?</h1>
        <p>Vos données medicale sont <strong class="very-important-word">précieuses</strong>, et doivent être protégées. C'est pour cela que nous avons mis au point un puissant logiciel de cryptage afin de vous proposer une <strong class="very-important-word">sécurité maximale</strong>. Enfin, vos données sont stockées dans une base de données spéciale, reconnue par le <strong class="very-important-word">gouvernement</strong>. Avec Vaccin 'line, vos données sont protégées et ne seront jamais partagées.</p>
      </div>
    </div>
    <div class="bigbox3">
      <div class="stats3">
        <h1>Eviter la réapparition <br>de dangereuses maladies</h1>
        <p>Certaines maladies semblent avoir disparu en France, ou être devenues très rares. Cependant, la plupart des microbes qui causent ces maladies existent toujours, y compris sur notre territoire. La vaccination doit donc se poursuivre. Ces microbes restent une menace pour les personnes non protégées par la vaccination ou insuffisamment protégées.</p>
      </div>
    </div>
    <div class="button">
      <div class="effect">
        <!-- effect btn -->
        <a href="<?php if(empty($_SESSION)){ echo "signin.php";} elseif(!empty($_SESSION)){ echo "carnet.php";} ?>"  class="btn_inscription">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <?php if(empty($_SESSION)){ echo "Inscription";} elseif(!empty($_SESSION)){ echo "Mon carnet";} ?>
        </a>
      </div>
      <?php if(empty($_SESSION)) : ?>
      <div class="effect">
        <!-- effect btn -->
        <a href="login.php"  class="btn_connexion">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          connexion
        </a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php

  include('inc/footer-front.php');
?>

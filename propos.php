<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'A propos';
//debug($_SESSION);
//debug($_SESSION);

$errors = array();
?>
<section>
  <img src="asset/img/hugologo.png" class="logo-fixed">
</section>
<?php
include('inc/header-front.php');?>
<!-- <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br> -->
<script type="text/javascript" src="asset/js/konami.js"></script>
<section id="about">
  <div class="title-text">
    <p>À propos</p>
    <h1>Notre histoire</h1>
  </div>
  <div class="about-box">
    <div class="abouts">
      <h1>Qui sommes nous</h1>
      <div class="abouts-desc">
        <div class="about-icon">
          <i class="fa fa-user-circle"></i>
        </div>
        <div class="about-text">
          <p>Nous sommes juste des étudiants en première année d'un bachelor en développement web, rien de plus ! Entre la team front composée de <a href="#quentin"><strong>Quentin Vannarath</strong></a>, <a href="#enzo"><strong>Enzo Vitorino</strong></a> et <a href="#florian"><strong>Florian Galvani</strong></a>, la team back composée de <a href="#lucas"><strong>Lucas Bellier</strong></a> et <a href="#valentin"><strong>Valentin Lamy</strong></a>, la concurence a du soucis a se faire !</p>
        </div>
      </div>
      <h1>Projet: Carnet de Vaccination</h1>
      <div class="abouts-desc">
        <div class="about-icon">
          <i class="fa fa-history"></i>
        </div>
        <div class="about-text">
          <p>Vaccin Line est un projet que nous avons dû réaliser en deux semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
        </div>
      </div>
      <h1>Konami Code#</h1>
      <div class="abouts-desc">
        <div class="about-icon-hint">
          <i class="fa fa-arrow-up"></i>
          <i class="fa fa-arrow-up"></i>
          <i class="fa fa-arrow-down"></i>
          <i class="fa fa-arrow-down"></i>
          <i class="fa fa-arrow-left"></i>
          <i class="fa fa-arrow-right "></i>
          <i class="fa fa-arrow-left"></i>
          <i class="fa fa-arrow-right "></i>
          <i class="fa fa-bold"></i>
          <i class="fa fa-amazon"></i>
        </div>
      </div>
    </div>
    <div class="abouts-img">
      <img src="asset/img/about1.jpg" alt="">
    </div>
  </div>

  <div class="bigbox">
    <div id="konamicode">
      <div class="bigbox-start">
        <div class="stats-about">
          <h1 id="lucas">Lucas AKA ImJustLucas<span class="age"> (19)</span></h1><p class="role">(Chef de projet et Team Back)</p>
          <p>Très fier de son système de notification des e-mails</p>
        </div>
        <div class="img-stats">
          <img src="asset/img/lucas.jpg" alt="">
        </div>
      </div>
      <div class="bigbox-right">
        <div class="stats-about">
          <h1 id="enzo">Enzo AKA VitorinoNzo<span class="age"> (19)</span></h1><p class="role">(Team Front)</p>
          <p>Blagues nulles et chansons sont ses passions, il a encore beaucoup de choses à apprendre !</p>
        </div>
        <div class="img-stats">
          <img src="asset/img/enzo.png" alt="">
        </div>
      </div>
      <div class="bigbox-left">
        <div class="stats-about">
          <h1 id="florian">Florian AKA Legilmalas<span class="age"> (24)</span></h1><p class="role">(Team Front)</p>
          <p>Achetons-lui un micro !</p>
        </div>
        <div class="img-stats">
          <img src="asset/img/florian.png" alt="">
        </div>
      </div>
      <div class="bigbox-right">
        <div class="stats-about">
          <h1 id="quentin">Quentin AKA Natty<span class="age"> (27)</span></h1><p class="role">(Team Front)</p>
          <p>Sa chanson préférée ? Viser la lune - Amel Bent</p>
        </div>
        <div class="img-stats">
          <img src="asset/img/quentin.jpg" alt="">
        </div>
      </div>
      <div class="bigbox-end">
        <div class="stats-about">
          <h1 id="valentin">Valentin AKA Dzr<span class="age"> (19)</span></h1><p class="role">(Team Back)</p>
          <p>🎶Fais dodo, Valentin mon p'tit père🎶</p>
        </div>
        <div class="img-stats">
          <img src="asset/img/valentin.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>



<?php include('inc/footer-front.php'); ?>

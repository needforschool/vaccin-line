<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Mentions légales';
// debug($_SESSION);
// debug($_SESSION);

$errors = array();

include('inc/header-front.php');?>

<div class="wrap-section">
<div class="bigbox">
  <div class="stats">
    <h1>Qui sommes-nous ?</h1>
    <p>Nous ? Nous sommes juste des étudiants en première année d'un bachelor en développement web, rien de plus ! Entre la team front composée de <a href="#"><strong>Quentin Vannarath</strong></a> et <a href="#"><strong>Enzo Vitorino</strong></a>, la team back composée de <a href="#"><strong>Lucas Bellier</strong></a> notre chef de projet et <a href="#"><strong>Valentin Lamy</strong></a>, <a href="#"><strong>Florian Galvani</strong></a>, a du soucis a se faire !</p>
  </div>
</div>
<div class="bigbox2">
  <div class="stats">
    <h1>L'histoire de Vaccin'Line</h1>
    <p>Vaccin'Line est un projet que nous avons dû réaliser en 2 semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
  </div>
</div>
<div class="bigbox">
  <div class="stats">
    <h1>Lucas AKA ImJustLucas</h1><p class="role">(Chef de projet et Team Back)</p>
    <p>Certaines maladies semblent avoir disparu en France, ou être devenues très rares. Cependant, la plupart des microbes qui causent ces maladies existent toujours, y compris sur notre territoire. La vaccination doit donc se poursuivre. Ces microbes restent une menace pour les personnes non protégées par la vaccination ou insuffisamment protégées.</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/lucas.jpg" alt="">
  </div>
</div>
<div class="bigbox2">
  <div class="stats">
    <h1>Enzo AKA VitorinoNzo</h1><p class="role">(Team Front)</p>
    <p>Vaccin'Line est un projet que nous avons dû réaliser en 2 semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/enzo.png" alt="">
  </div>
</div>
<div class="bigbox">
  <div class="stats">
    <h1>Florian AKA Legilmalas</h1><p class="role">(Team Front)</p>
    <p>Vaccin'Line est un projet que nous avons dû réaliser en 2 semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/florian.png" alt="">
  </div>
</div>
<div class="bigbox2">
  <div class="stats">
    <h1>Quentin AKA Natty</h1><p class="role">(Team Front)</p>
    <p>Vaccin'Line est un projet que nous avons dû réaliser en 2 semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/quentin.jpg" alt="">
  </div>
</div>
<div class="bigbox">
  <div class="stats">
    <h1>Valentin AKA Dzr</h1><p class="role">(Team Back)</p>
    <p>Vaccin'Line est un projet que nous avons dû réaliser en 2 semaines (du 09/11/2020 au 20/11/2020), avec pour demande de développer un site web permettant aux clients de renseigner leur carnet de vaccination afin d'automatiser celui-ci (informer sur les différents vaccins, rappeler la date des rappels), tout en protégeant les données de nos utilisateurs.</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/valentin.jpg" alt="">
  </div>
</div>
</div>
</div>




<?php include('inc/footer-front.php'); ?>
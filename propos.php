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
    <p>Nous ? Nous sommes juste des étudiants en première année d'un bachelor en développement web, rien de plus ! Entre la team front composée de <a href="#quentin"><strong>Quentin Vannarath</strong></a>, <a href="#enzo"><strong>Enzo Vitorino</strong></a> et <a href="#florian"><strong>Florian Galvani</strong></a>, la team back composée de <a href="#lucas"><strong>Lucas Bellier</strong></a> et <a href="#valentin"><strong>Valentin Lamy</strong></a>, la concurence a du soucis a se faire !</p>
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
    <h1 id="lucas">Lucas AKA ImJustLucas</h1><p class="role">(Chef de projet et Team Back)</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/lucas.jpg" alt="">
  </div>
</div>
<div class="bigbox2">
  <div class="stats">
    <h1 id="enzo">Enzo AKA VitorinoNzo</h1><p class="role">(Team Front)</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/enzo.png" alt="">
  </div>
</div>
<div class="bigbox">
  <div class="stats">
    <h1 id="florian">Florian AKA Legilmalas</h1><p class="role">(Team Front)</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/florian.png" alt="">
  </div>
</div>
<div class="bigbox2">
  <div class="stats">
    <h1 id="quentin">Quentin AKA Natty</h1><p class="role">(Team Front)</p>
  </div>
  <div class="img-stats">
    <img src="asset/img/quentin.jpg" alt="">
  </div>
</div>
<div class="bigbox3">
  <div class="stats">
    <h1 id="valentin">Valentin AKA Dzr</h1><p class="role">(Team Back)</p>
    </div>
    <div class="img-stats">
    <img src="asset/img/valentin.jpg" alt="">
  </div>
</div>
</div>




<?php include('inc/footer-front.php'); ?>
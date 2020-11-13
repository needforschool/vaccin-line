<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Mentions légales';
// debug($_SESSION);
// debug($_SESSION);

$errors = array();

include('inc/header-front.php');?>
<section id="about">
  <div class="wrap-about">
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
    <div class="bigbox-start">
      <div class="stats-about">
        <h1 id="lucas">Lucas AKA ImJustLucas<span class="age"> (19)</span></h1><p class="role">(Chef de projet et Team Back)</p>
        <p>Le chef / la chef de projet web gère l'ensemble d'un projet de site internet, qu'il s'agisse d'une création ou d'une refonte. Il analyse dans le détail les besoins du client et rédige le cahier des charges, puis coordonne le travail de tous les acteurs du projet.</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/lucas.jpg" alt="">
      </div>
    </div>
    <div class="bigbox4">
      <div class="stats-about">
        <h1 id="enzo">Enzo AKA VitorinoNzo<span class="age"> (19)</span></h1><p class="role">(Team Front)</p>
        <p>Un développeur front-end est un professionnel de l'informatique et/ou du web design capable de produire des sites web en utilisant ses connaissances en HTML, CSS et javascript, éventuellement couplées à des compétences dans le domaines d'un ou de plusieurs gestionnaires de contenus (CMS).</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/enzo.png" alt="">
      </div>
    </div>
    <div class="bigbox3">
      <div class="stats-about">
        <h1 id="florian">Florian AKA Legilmalas<span class="age"> (19)</span></h1><p class="role">(Team Front)</p>
        <p>Un développeur front-end est un professionnel de l'informatique et/ou du web design capable de produire des sites web en utilisant ses connaissances en HTML, CSS et javascript, éventuellement couplées à des compétences dans le domaines d'un ou de plusieurs gestionnaires de contenus (CMS).</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/florian.png" alt="">
      </div>
    </div>
    <div class="bigbox4">
      <div class="stats-about">
        <h1 id="quentin">Quentin AKA Natty<span class="age"> (27)</span></h1><p class="role">(Team Front)</p>
        <p>Un développeur front-end est un professionnel de l'informatique et/ou du web design capable de produire des sites web en utilisant ses connaissances en HTML, CSS et javascript, éventuellement couplées à des compétences dans le domaines d'un ou de plusieurs gestionnaires de contenus (CMS).</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/quentin.jpg" alt="">
      </div>
    </div>
    <div class="bigbox-end">
      <div class="stats-about">
        <h1 id="valentin">Valentin AKA Dzr<span class="age"> (19)</span></h1><p class="role">(Team Back)</p>
        <p>Le développeur back-end gère toute la partie « non visible » du développement : il conçoit les éléments techniques nécessaires au fonctionnement d'un site, il se charge de la gestion des bases de données… Il a donc une connaissance approfondie des langages de programmation tels que PHP, Ruby, Python, Java, .</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/valentin.jpg" alt="">
      </div>
    </div>
  </div>
</section>



<?php include('inc/footer-front.php'); ?>

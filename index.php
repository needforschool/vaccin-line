<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

$errors = array();

include('inc/header-front.php');

?>
<section id="banner">
  <img src="asset/img/hugologonb.png" class="logo">
  <div class="banner-text">
    <h1>Vaccin Line</h1>
    <p>Vaccin Line Le Carnet Du Futur</p>
    <div class="banner-btn">
      <a href="signin.php"><span></span>Inscription</a>
      <a href="login.php"><span></span>Connexion</a>
    </div>
  </div>
  <div class="log-header">
    <!-- Si non connecter -->
    <?php if(empty($_SESSION)) : ?>

    <?php endif; ?>
    <!-- Si connecter  -->
    <?php if(!empty($_SESSION)) : ?>

    <?php endif; ?>
  </div>
</section>
<!-- feature -->
<section id="feature">
  <div class="title-text">
    <p>Fonctionnalités</p>
    <h1>Pourquoi Nous Choisir</h1>
  </div>
  <div class="feature-box">
    <div class="features">
      <h1>Equipe d'expérience</h1>
      <div class="features-desc">
        <div class="feature-icon">
          <i class="fa fa-check-square-o"></i>
        </div>
        <div class="feature-text">
          <p>Géré et sécurisé par une équipe expérimenté. Le carnet se veut accessible et fonctionnel.</p>
        </div>
      </div>
      <h1>Sécurité</h1>
      <div class="features-desc">
        <div class="feature-icon">
          <i class="fa fa-shield"></i>
        </div>
        <div class="feature-text">
          <p>L'adhésion se fait entièrement en ligne, procédure administrative simple et rapide, pour un gain de temps assuré.</p>
        </div>
      </div>
      <h1>Gratuité</h1>
      <div class="features-desc">
        <div class="feature-icon">
          <i class="fa fa-inr"></i>
        </div>
        <div class="feature-text">
          <p>Notre carnet de vaccination et totalement gratuit et disponible à vie, dès lors que vous vous inscrivez une première fois.</p>
        </div>
      </div>
    </div>
    <div class="features-img">
      <img src="asset/img/feature.jpg" alt="">
    </div>
  </div>
</section>
  <!-- service -->
<section id="service">
  <div class="title-text">
    <p>SERVICES</p>
    <h1>Nos Meilleurs Services</h1>
  </div>
  <div class="service-box">
    <div class="single-service">
      <img src="asset/img/pic1.jpg" alt="">
      <div class="overlay"></div>
      <div class="service-desc">
        <h3>Inscription Valable à Vie</h3>
        <hr>
        <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
      </div>
    </div>
    <div class="single-service">
      <img src="asset/img/pic2.jpg" alt="">
      <div class="overlay"></div>
      <div class="service-desc">
        <h3>Sécurité</h3>
        <hr>
        <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
      </div>
    </div>
    <div class="single-service">
      <img src="asset/img/pic3.jpg" alt="">
      <div class="overlay"></div>
      <div class="service-desc">
        <h3>Automatisation des Tâches</h3>
        <hr>
        <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
      </div>
    </div>
    <div class="single-service">
      <img src="asset/img/pic4.jpg" alt="">
      <div class="overlay"></div>
      <div class="service-desc">
        <h3>Dry Shampoo</h3>
        <hr>
        <p>this is test under description of barber foundation this is test under description of barber foundation.</p>
      </div>
    </div>
  </div>
</section>
  <!-- témoignages -->
<section id="testimonial">
  <div class="title-text">
    <p>TEMOIGNAGES</p>
    <h1>Commentaires Clients</h1>
  </div>
  <div class="testimonial-row">
    <div class="testimonial-col">
      <div class="user">
        <img src="asset/img/img-1.jpg" alt="">
        <div class="user-info">
          <h4>ANTOINE DANIEL <i class="fa fa-twitter"></i></h4>
          <small>@antoinedaniel</small>
        </div>
      </div>
      <p>Beaucoup de contenu utile, la mise à jour des vaccins permet de suivre son actualisation. Les données sont sauvegardés et sécurisés. </p>
    </div>
    <div class="testimonial-col">
      <div class="user">
        <img src="asset/img/img-2.jpg" alt="">
        <div class="user-info">
          <h4>ELLA DANLOSS <i class="fa fa-twitter"></i></h4>
          <small>@elladanloss</small>
        </div>
      </div>
      <p>Je suis satisfaite de l'offre de l'entreprise. Communiquais avec le service client m'a aidé à trouver exactement ce que je recherchais.</p>
    </div>
    <div class="testimonial-col">
      <div class="user">
        <img src="asset/img/img-3.jpg" alt="">
        <div class="user-info">
          <h4>TOM EIGERI <i class="fa fa-twitter"></i></h4>
          <small>@tomeigeri</small>
        </div>
      </div>
      <p>Une équipe toujours souriante et sympathique, un délai de service court font que notre choix c'est porté sur Vaccin'Line.</p>
    </div>
  </div>
</section>

<?php


  include('inc/footer-front.php');

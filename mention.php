<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Mentions légales';
// debug($_SESSION);
// debug($_SESSION);

$errors = array();

include('inc/header-front.php');?>

<section id="mention">
  <div class="title-text">
    <p>Mentions Légales</p>
    <h1>Nos Mentions</h1>
  </div>
  <div class="mention-box">
    <div class="mentions">
      <h1>Mentions légales</h1>
      <div class="mentions-desc">
        <div class="mention-text">
          <p>Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site vaccinline.fr l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</p>
        </div>
      </div>
      <h1>Edition du site</h1>
      <div class="mentions-desc">
        <div class="mention-text">
          <p>Le site vaccinline.fr est édité par la société Vaccin'Corp, société par actions simplifiée au capital de 10.051,50 euros, dont le siège social est situé 24 place Saint Marc, 76000 Rouen.</p>
        </div>
      </div>
      <h1>Responsable de publication</h1>
      <div class="mentions-desc">
        <div class="mention-text">
          <p>Antoine Quidel</p>
        </div>
      </div>
      <h1>Hébergeur</h1>
      <div class="mentions-desc">
        <div class="mention-text">
          <p>Le site vaccinline.fr est hébergé par NFactory School<br>Adresse: 24 place Saint Marc<br>
          Le stockage des données personnelles des Utilisateurs est exclusivement réalisé sur les centre de données (« clusters ») localisés dans des Etats membres de l’Union Européenne de l'établissement NFactory School, et est sécurisé et crypté.</p>
        </div>
      </div>
      <h1>CNIL</h1>
      <div class="mentions-desc">
        <div class="mention-text">
          <p>La société Vaccin'Corp conservera dans ses systèmes informatiques et dans des conditions raisonnables de sécurité une preuve de la transaction comprenant le bon de commande et la facture.</p>
          <p>La société Vaccin'Corp a fait l’objet d’une déclaration à la CNIL sous le numéro 1986932.</p>
          <p>Conformément aux dispositions de la loi 78-17 du 6 janvier 1978 modifiée, l’Utilisateur dispose d’un droit d’accès, de modification et de suppression des informations collectées par Vaccin'Corp. Pour exercer ce droit, il reviendra à l’utilisateur d’envoyer un message à l’adresse suivante : vaccin.line@gmail.com</p>
        </div>
      </div>
  </div>
  <div class="mentions-img">
    <img src="asset/img/mention.jpg" alt="">
  </div>
</div>
</section>








<?php include('inc/footer-front.php');?>

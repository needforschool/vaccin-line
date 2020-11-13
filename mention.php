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
  <div class="wrap-section-inscription-1">
    <div class="mentions-legales">
      <h2>Mentions légales</h2>
      Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site legalplace.fr l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.

<h2>Edition du site</h2>
Le site legalplace.fr est édité par la société LegalPlace, société par actions simplifiée au capital de 10.051,50 euros, dont le siège social est situé 47 rue Marcel Dassault, 92100 Boulogne-Billancourt, immatriculée au registre du commerce et des sociétés sous le numéro d’identification unique 814 428 785 RCS Nanterre.

<h2>Responsable de publication</h2>
Samuel Goldstein

<h2>Hébergeur</h2>
Le site legalplace.fr est hébergé par la société Amazon Web Services LLC

Adresse: P.O. Box 81226, Seattle, WA 98108-1226

Le stockage des données personnelles des Utilisateurs est exclusivement réalisé sur les centre de données (« clusters ») localisés dans des Etats membres de l’Union Européenne de la société Amazon Web Services LLC

<h2>CNIL</h2>
La société LegalPlace conservera dans ses systèmes informatiques et dans des conditions raisonnables de sécurité une preuve de la transaction comprenant le bon de commande et la facture.

La société LegalPlace a fait l’objet d’une déclaration à la CNIL sous le numéro 1986932.

Conformément aux dispositions de la loi 78-17 du 6 janvier 1978 modifiée, l’Utilisateur dispose d’un droit d’accès, de modification et de suppression des informations collectées par LegalPlace. Pour exercer ce droit, il reviendra à l’Utilisateur d’envoyer un message à l’adresse suivante : support@legalplace.fr
    </div>
  </div>
</section>








<?php include('inc/footer-front.php');?>
<?php

include('../inc/pdo.php');
session_start();
//php code to send mail, 
//author : idrish laxmidhar
//Use this code to send a test mail from your localhost.
$sql = "SELECT * FROM vl_user_settings WHERE relance = 'on'";
$query = $pdo->prepare($sql);
$query->execute();
$settings = $query->fetchall();

foreach ($settings as $setting) {
    $id = $setting['user_id'];
    $sql = "SELECT * FROM vl_users WHERE id = :id ";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_STR);
    $query->execute();
    $userinfos = $query->fetch();

    $to = $userinfos['email'];
    $subject = "Vos prochains renouvellement de vaccins";
    $body="Bonjour ".$userinfos['prenom'].PHP_EOL;
    $body.="Vous avez "."variable nombre vaccins a faire "."a faire ce mois ci ".PHP_EOL;
    $body.="Bonne journée".PHP_EOL;
    $body.="L'equipe de Vaccin'line".PHP_EOL;
    $body.="http://localhost/projet/vaccin-line/index.php".PHP_EOL;
 
    $headers = "From: noreply@localhost.com"; 
 
    if (mail($to, $subject, $body, $headers)) {
        echo("Message successfully sent!");
        // sleep(5);
        // header('Location: index.php');
    } else {
        echo("Message delivery failed...");
    }
}

?>

 



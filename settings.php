<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
// debug($_SESSION);
// debug($_SESSION);

$id = $_SESSION['user']['id'];

$errors = array();
$passchange = false;

include('inc/header-front.php');

if(!empty($_POST['submitted'])) {
    $pass = cleanXss($_POST['pass']);
    $newpass1 = cleanXss($_POST['newpass']);
    $newpass2 = cleanXss($_POST['newpassconfirm']);

    $sql = "SELECT * FROM vl_users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if(password_verify($pass,$user['password']) == true) {
        echo 'ok';
        if (!empty($newpass1)) {
            if ($newpass1 > 8) {
                if(!empty($newpass2)) {
                    if ($newpass1 == $newpass2) {
                        # code...
                    } else {
                        $errors['newpass1'] = "Les mots nouveaux mots de passe ne sont pas identiques ";
                    }
                } 
            } else {
                $errors['newpass1'] = "8 caracteres minimum";
            }
        }
        else {
            $errors['newpass1'] = "Veuillez renseigner ce champ";
        }
    }
    else {
        $errors['newpass2'] = "Erreur mot de passe";
    }

    if(count($errors) == 0) {
        $passchange = true;
        $passhash = password_hash($newpass1, PASSWORD_DEFAULT);

        $sql = "UPDATE vl_users SET password = :passhash  WHERE ID = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':passhash',$passhash,PDO::PARAM_STR);
        $query->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_STR);
        $query->execute();
    }
}

?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
    
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>
    <!-- Affichage formulaire changement de mdp -->
    <?php if($passchange == false) : ?>
        <h4>Modifier votre mot de passe</h4>
        <form action="settings.php" method="post">
            <input type="password" name="pass" placeholder="Mot de passe actuel">
            <span class="error"><?php if(!empty($errors['pass'])) { echo $errors['pass']; } ?></span>
            <input type="password" name="newpass" placeholder="Nouveau mot de passe">
            <span class="error"><?php if(!empty($errors['newpass1'])) { echo $errors['newpass1']; } ?></span>
            <input type="password" name="newpassconfirm" placeholder="Confirmation nouveau mot de passe">
            <span class="error"><?php if(!empty($errors['newpass2'])) { echo $errors['newpass2']; } ?></span> 
            <input type="submit" name="submitted">
        </form>
    <?php endif; ?>
    <?php if($passchange == true) : ?>
        <h4>Mot de passe modifié !</h4>
    <?php endif; ?>
<?php endif; ?>
<?php include('inc/footer-front.php');

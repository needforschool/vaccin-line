<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

$id = $_SESSION['user']['id'];

$errors = array();
$passchange = false;
debug($_SESSION);

include('inc/header-front.php');

if (!empty($_POST['enregister'])) {
    echo 'enregisrter';
    if (!empty($_POST['journuit'])) {
        echo 'journuit';
        if ($_POST['journuit'] == 0){
            $jour_nuit = 'nuit';
        } elseif ($_POST['journuit'] == 1 ) {
            $jour_nuit = 'jour';
        }

        $sql = "UPDATE vl_users_setting SET jour_nuit = :jour_nuit  WHERE ID = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':jour_nuit',$jour_nuit,PDO::PARAM_STR);
        $query->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_STR);
        $query->execute();

        $sql = "SELECT * FROM vl_user_settings WHERE user_id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_STR);
        $query->execute();
        $settings = $query->fetch();

        $_SESSION['settings'] = array(
          'jour_nuit' => $settings['jour_nuit']
        );

        debug($_SESSION);
    }
}

if (!empty($_POST['supprimer'])) {
    if (condition) {
        # code...
    }
}

if(!empty($_POST['modifmdp'])) {
    $pass = cleanXss($_POST['pass']);
    $newpass1 = cleanXss($_POST['newpass']);
    $newpass2 = cleanXss($_POST['newpassconfirm']);

    $sql = "SELECT * FROM vl_users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if(password_verify($pass,$user['password']) == true) {
        if (!empty($newpass1)) {
            if ($newpass1 < 8) {
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
        } else {
            $errors['newpass1'] = "Veuillez renseigner ce champ";
        }
    } else {
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
    <?php  header('Location: connexion.php');?>
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>
    <!-- Formulaire changement de mdp -->
    <?php if($passchange == false) : ?>
        <h4>Modifier votre mot de passe</h4>
        <form action="settings.php" method="post">
            <input type="password" name="pass" placeholder="Mot de passe actuel">
            <span class="error"><?php if(!empty($errors['pass'])) { echo $errors['pass']; } ?></span>
            <input type="password" name="newpass" placeholder="Nouveau mot de passe">
            <span class="error"><?php if(!empty($errors['newpass1'])) { echo $errors['newpass1']; } ?></span>
            <input type="password" name="newpassconfirm" placeholder="Confirmation nouveau mot de passe">
            <span class="error"><?php if(!empty($errors['newpass2'])) { echo $errors['newpass2']; } ?></span> 
            <input type="submit" name="modifmdp" value="Changer le mot de passe">
        </form>
    <?php endif; ?>
    <?php if($passchange == true) : ?>
        <h4>Mot de passe modifié !</h4>
    <?php endif; ?>
    <!-- Formulaire modification parametre -->
    <form action="settings.php" method="post">
        <h4>Mode jour/nuit</h4>
        <?php if($_SESSION['settings']['jour_nuit'] == "jour") : ?>
            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        <?php endif; ?>
        <?php if($_SESSION['settings']['jour_nuit'] == "nuit") : ?>
            <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>
        <?php endif; ?>
        <input type="submit" name="enregistrer" value="Enregister">
    </form>
    <!-- Formulaire suppresion compte  -->
    <!-- <form action="settings.php" method="post">
        
        <input type="submit" name="supprimer" value="Supprimer" style="background: red;">
    </form> -->
<?php endif; ?>
<?php include('inc/footer-front.php');

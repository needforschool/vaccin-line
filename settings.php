<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Parametres';

$id = $_SESSION['user']['id'];

$errors = array();
$passchange = false;
$paramchange = false;
// debug($_SESSION);
include('inc/header-front.php');
if (!empty($_POST['enregistrer'])) {
    if (empty($_POST['relance'])) {
        $paramchange = true;
        $_SESSION['settings']['relance'] = 'off';
        $relance = 'off';
        echo $mode;
    } elseif (!empty($_POST['relance'])) {
        $paramchange = true;
        $_SESSION['settings']['relance'] = 'on';
        $relance = 'on';
        echo $mode;
    }

    $sql = "UPDATE vl_user_settings SET relance = :relance  WHERE user_id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':relance',$relance,PDO::PARAM_STR);
    $query->bindValue(':id',$id,PDO::PARAM_STR);
    $query->execute();

    header('Location: settings.php');


}else

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
    <section id="parametre">
    <div class="wrap-section-parametre">
        <!-- Formulaire changement de mdp -->
        <?php if($passchange == false) : ?>

            <form action="settings.php" method="post">

                <div class="form-param-1">
                <h2>Modifier votre mot de passe</h2>
                    <div class="w50">
                        <input type="password" name="pass" required>
                        <span class="error"><?php if(!empty($errors['pass'])) { echo $errors['pass']; } ?></span>
                        <label>Mot de passe actuel</label>
                    </div>
                    <div class="w50">
                        <input type="password" name="newpass" required>
                        <span class="error"><?php if(!empty($errors['newpass1'])) { echo $errors['newpass1']; } ?></span>
                        <label>Nouveau mot de passe</label>
                    </div>
                    <div class="w50">
                        <input type="password" name="newpassconfirm" required>
                        <span class="error"><?php if(!empty($errors['newpass2'])) { echo $errors['newpass2']; } ?></span>
                        <label>Confirmation nouveau mot de passe</label>
                    </div>
                        <input type="submit" name="modifmdp" value="Changer le mot de passe">
                </div>
            </form>

        <?php endif; ?>
        <?php if($passchange == true) : ?>
            <h4>Mot de passe modifié !</h4>
        <?php endif; ?>
        <!-- Formulaire modification parametre -->
        <form action="settings.php" method="post">
            <div class="form-param-2">
                <h2>Paramètres</h2>
                <div class="relance">
                <?php if($paramchange == false) : ?>
                    <?php if($_SESSION['settings']['relance'] == "off") : ?>

                            <div class="relance-text">
                                <p>Alerte vaccin</p>
                            </div>
                            <div class="relance-btn">
                                <label class="switch">
                                    <input type="checkbox" name="relance" value="off">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                    <?php endif; ?>
                    <?php if($_SESSION['settings']['relance'] == "on") : ?>
                            <div class="relance-text">
                            <p>Alerte vaccin</p>
                            </div>
                            <div class="relance-btn">
                                <label class="switch">
                                    <input type="checkbox" name="relance" value="on" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if($paramchange == true) : ?>
                    <p>parametre modifié !</p>
                <?php endif; ?>
                </div>
                <input type="submit" name="enregistrer" value="Enregister">

            </div>

        </form>
    </div>
    </section>
    <!-- Formulaire suppresion compte  -->
    <!-- <form action="settings.php" method="post">

        <input type="submit" name="supprimer" value="Supprimer" style="background: red;">
    </form> -->
<?php endif; ?>
<?php
include('inc/mini-footer-front.php');

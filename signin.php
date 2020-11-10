<?php
include('inc/pdo.php');
include('inc/function.php');

$errors = array();
$succes = false;
if (!empty($_POST['submitted'])) {
    // faille xss
    $nom = cleanXss($_POST['pseudo']);
    $prenom = cleanXss($_POST['email']);
    $
    $email = cleaXss($_POST['email']);
    $password1 = cleanXss($_POST['password1']);
    $password2 = cleanXss($_POST['password2']);
    if (!empty($pseudo)) {
        if(mb_strlen($pseudo) < 3) {
            $errors['pseudo'] = 'Min 3 caracteres';
        } elseif(mb_strlen($pseudo) > 50) {
            $errors['pseudo'] = 'Max 50 caracteres';
        } else {
            // no error
            $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
            $query = $pdo->prepare($sql);
            $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
            $query->execute();
            $userpseudo = $query->fetch();

            if (!empty($userpseudo)) {
                $errors['pseudo'] = 'ce pseudo existe déja';
            }
            else {

            }
        }
    } else {
        $errors['pseudo'] = 'Veuillez renseigner ce champ';
    }
    if (!empty($email)) {
        // no error
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $useremail = $query->fetch();

        if (!empty($useremail)) {
            $errors['email'] = 'cette email est déja utilisée';
        } else {
            // no errors
        }
    } else {
        $errors['email'] = 'Veuillez renseigner ce champ';
    }
    if (!empty($password1)) {
        if (mb_strlen($password1) < 6) {
            $errors['password1'] = 'Min 6 caracteres';
        }
    } else {
        $errors['password1'] = 'Veuillez renseigner ce champ';
    }

    if (!empty($password2)) {
        //no errors
    } else {
        $errors['password2'] = 'Veuillez renseigner ce champ';
    }

    if ($password1 != $password2) {
        $errors['password2'] = 'Les mot de passe ne sont pas identiques';  
    }

    if(count($errors) == 0) {
        $success = true;

        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        $token = substr(md5(time()), 0, 16);
        
        $role = 'abonne';

        $sql = "INSERT INTO users (pseudo,email,password,created_at,token,role)
            VALUES (:pseudo,:email,:passwordHash,NOW(),:token,:role)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->bindValue(':passwordHash',$passwordHash,PDO::PARAM_STR);
        $query->bindValue(':token',$token,PDO::PARAM_STR);
        $query->bindValue(':role',$role,PDO::PARAM_STR);
        $query->execute();

        header('Location: index.php');
        exit();
    }
}

include('inc/header.php');
?>

<h1>Sign in</h1>

<!-- pseudo -->
<!-- email -->
<!-- password x2 -->
<form action="inscription.php" method="post" class="formulaire">

<label for="pseudo"> Pseudo :</label>
<span class="error"><?php if(!empty($errors['pseudo'])) { echo $errors['pseudo']; } ?></span>
<input type="text" name="pseudo" value="<?php if(!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>">
<br>
<label for="email"> Email :</label>
<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
<input type="email" name="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
<br>
<label for="pass"> Password :</label>
<span class="error"><?php if(!empty($errors['password1'])) { echo $errors['password1']; } ?></span>
<input type="password" name="password1" value="<?php if(!empty($_POST['password1'])) { echo $_POST['password1']; } ?>">
<br>
<label for="comfirmpass">Confirm password :</label>
<span class="error"><?php if(!empty($errors['password2'])) { echo $errors['password2']; } ?></span>
<input type="password" name="password2" value="<?php if(!empty($_POST['password2'])) { echo $_POST['password2']; } ?>">
<br>
<input type="submit" name="submitted" value="Envoyer">

</form>

<?php

include('inc/footer.php');


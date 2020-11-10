<?php
include('inc/pdo.php');
include('inc/function.php');
$title = 'Inscription';
$errors = array();
$succes = false;
if (!empty($_POST['submitted'])) {
    $nom = cleanXss($_POST['nom']);
    $prenom = cleanXss($_POST['prenom']);
    $age = cleanXss($_POST['age']);
    $civilite = cleanXss($_POST['civilite']);
    $email = cleanXss($_POST['email']);
    $password1 = cleanXss($_POST['password1']);
    $password2 = cleanXss($_POST['password2']);
    $pseudo = $nom . '_' . $prenom;

    //Verif civilité

    if(!empty($civilite)) {
        
    } else {
        $errors['civilite'] = 'Veuillez renseignez ce champ';
    }
   
    // Verif nom 
    if(!empty($nom)) {
        if(mb_strlen($nom) < 2) {
            $errors['nom'] = 'Veuillez entrer un nom valide (2 caracteres minimum)';
        }
    } else {
        $errors['nom'] = 'Veuillez renseignez ce champ';
    }
    // Verif prenom
    if(!empty($prenom)) {
        if(mb_strlen($prenom) < 2) {
            $errors['prenom'] = 'Veuillez entrer un prenom valide (2 caracteres minimum)';
        }
    } else {
        $errors['prenom'] = 'Veuillez renseignez ce champ';
    }
    // Verif age
    if(!empty($age)) {
        if(mb_strlen($age) > 3) {
            $errors['age'] = 'Veuillez entrer un age valide (entre 1 et 110)';
        }
    } else {
        $errors['age'] = 'Veuillez renseignez ce champ';
    }
    // Verif E-mail 
    if (!empty($email)) {
        if(mb_strlen($email) < 5 ) {
            $errors['email'] = 'Veuillez entrer un email valide (plus de 5 caractéres)';
        }
    } else {
        $errors['email'] = 'Veuillez renseignez ce champ';
    }
    // Verif MDP et Hashash 
    if (!empty($password1)) {
        if(mb_strlen($password1) < 8) {
            $errors['password1'] = 'Votre mot de passe doit faire 8 caractere minimum';
        }
    } else {
        $errors['password1'] = 'Veuillez renseignez ce champ';
    }
    if (!empty($password2)) {

    } else {
        $errors['password2'] = 'Veuillez renseignez ce champ';
    }

    if ($password2 != $password1) {
        $errors['password1'] = 'Les mot de passe ne sont pas identiques';
    }

    if (count($errors) == 0) {
        $succes = true;

        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);

        $role = 'role_user';

        // echo $nom;
        // echo $prenom;
        // echo $age;
        // echo $civilite;
        // echo $email;
        // echo $passwordHash;
        // echo $pseudo;

        $sql = "INSERT INTO vl_users (nom,prenom,age,civilite,email,password)
                VALUES (:nom,:prenom,:age,:civilite,:email,:passwordHash)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom',$nom,PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindValue(':age',$age,PDO::PARAM_STR);
        $query->bindValue(':civilite',$civilite,PDO::PARAM_STR);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->bindValue(':passwordHash',$passwordHash,PDO::PARAM_STR);
        $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR); 
        $query->bindValue(':role',$role,PDO::PARAM_STR); 
        $query->execute();

}
    
}


 
include('inc/header-front.php');

?>
<form action="signin.php" method="post" class="formulaire">

<select name="civilite" id="civilite" >
    <option value="">--Civilité--</option>
    <option value="monsieur">Monsieur</option>
    <option value="madame">Madame</option>
</select>
<span class="error"><?php if(!empty($errors['civilite'])) { echo $errors['civilite']; } ?></span>

<input type="text" name="nom" placeholder="Nom" value="<?php if(!empty($_POST['nom'])) { echo $_POST['nom']; } ?>">
<span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>

<input type="text" name="prenom" placeholder="Prenom" value="<?php if(!empty($_POST['prenom'])) { echo $_POST['prenom']; } ?>">
<span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>

<input type="text" name="age" placeholder="age" value="<?php if(!empty($_POST['age'])) { echo $_POST['age']; } ?>">
<span class="error"><?php if(!empty($errors['age'])) { echo $errors['age']; } ?></span>

<input type="text" name="email" placeholder="E-mail" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>

<input type="text" name="password1" placeholder="Mot de passe" value="<?php if(!empty($_POST['password1'])) { echo $_POST['password1']; } ?>">
<span class="error"><?php if(!empty($errors['password1'])) { echo $errors['password1']; } ?></span>

<input type="text" name="password2" placeholder="Confirmation" value="<?php if(!empty($_POST['password2'])) { echo $_POST['password2']; } ?>">

<input type="submit" name="submitted" value="Envoyer">

</form>

<?php
include('inc/footer-front.php');

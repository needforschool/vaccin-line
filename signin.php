<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Inscription';
$errors = array();
$succes = false;
if (!empty($_POST['submitted'])) {
    $nom = cleanXss($_POST['nom']);
    $prenom = cleanXss($_POST['prenom']);
    $date_naissance = cleanXss($_POST['date_naissance']);
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
    // Verif date_naissance
    if(!empty($date_naissance)) {
        if(mb_strlen($date_naissance) != 10) {
            $errors['date_naissance'] = 'Veuillez entrer un date_naissance valide (entre 1 et 110)';
        } else {
            $am = date('Y');
            $an = explode('-', $date_naissance);
            $age = ($am - $an[0]);

            $date_naissance = date("d-m-Y", strtotime($date_naissance));

            echo $date_naissance;
        }
    } else {
        $errors['date_naissance'] = 'Veuillez renseignez ce champ';
    }
    // Verif E-mail
    if (!empty($email)) {
        if(mb_strlen($email) < 5 ) {
            $errors['email'] = 'Veuillez entrer un email valide (plus de 5 caractéres)';
        } else {
            $sql = "SELECT * FROM vl_users WHERE email = :email";
            $query = $pdo->prepare($sql);
            $query->bindValue(':email',$email,PDO::PARAM_STR);
            $query->execute();
            $useremail = $query->fetch();

            if (!empty($useremail)) {
                $errors['email'] = 'Cette adresse email est utilisée';
            }
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

        $sql = "INSERT INTO vl_users (nom,prenom,password,email,token,date_naissance,created_at,civilite,role,age)
                VALUES (:nom,:prenom,:passwordHash,:email,:token,:date_naissance,NOW(),:civilite,:role,:age)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom',$nom,PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $query->bindValue(':date_naissance',$date_naissance,PDO::PARAM_STR);
        $query->bindValue(':civilite',$civilite,PDO::PARAM_STR);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->bindValue(':passwordHash',$passwordHash,PDO::PARAM_STR);
        $query->bindValue(':role',$role,PDO::PARAM_STR);
        $query->bindValue(':token',$token,PDO::PARAM_STR);
        $query->bindValue(':age',$age,PDO::PARAM_STR);
        $query->execute();

        $sql = "SELECT * FROM vl_users WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        $_SESSION['user'] = array(
            'id' => $user['id'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'date_naissance' => $user['date_naissance'],
            'age' => $user['age'],
            'email' => $user['email'],
            'civilite' => $user['civilite'],
            'role' => $user['role'],
            'ip' => $_SERVER['REMOTE_ADDR']
        );
        header('Location: index.php');
        die();
    }
}



include('inc/header-front.php');

?>
<section id="inscription">
  <div class="wrap-section-inscription-1">
    <div class="form-inscription">
      <h2>Inscription</h2>
      <form action="signin.php" method="post" class="formulaire">
        <div class="w50">
          <select name="civilite" id="civilite" >
            <option value="">--Civilité--</option>
            <option value="monsieur">Monsieur</option>
            <option value="madame">Madame</option>
          </select>
          <span class="error"><?php if(!empty($errors['civilite'])) { echo $errors['civilite']; } ?></span>
        </div>
        <div class="w50">
          <input type="text" name="nom" placeholder="Nom" value="<?php if(!empty($_POST['nom'])) { echo $_POST['nom']; } ?>">
          <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>
        </div>
        <div class="w50">
          <input type="text" name="prenom" placeholder="Prénom" value="<?php if(!empty($_POST['prenom'])) { echo $_POST['prenom']; } ?>">
          <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>
        </div>
        <div class="w50">
          <input type="date" name="date_naissance" placeholder="date_naissance" value="<?php if(!empty($_POST['date_naissance'])) { echo $_POST['date_naissance']; } ?>">
          <span class="error"><?php if(!empty($errors['date_naissance'])) { echo $errors['date_naissance']; } ?></span>
        </div>
        <div class="w50">
          <input type="text" name="email" placeholder="E-mail" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
          <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
        </div>
        <div class="w50">
          <input type="password" name="password1" placeholder="Mot de passe" value="<?php if(!empty($_POST['password1'])) { echo $_POST['password1']; } ?>">
          <span class="error"><?php if(!empty($errors['password1'])) { echo $errors['password1']; } ?></span>
        </div>
        <div class="w50">
          <input type="password" name="password2" placeholder="Confirmation" value="<?php if(!empty($_POST['password2'])) { echo $_POST['password2']; } ?>">
        </div>
        <div class="w50">
          <input type="submit" name="submitted" value="Envoyer">
        </div>
      </form>

    </div>
  </div>
</section>
<?php
include('inc/footer-front.php');

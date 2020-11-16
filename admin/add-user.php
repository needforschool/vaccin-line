<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
isAdmin();
$title = 'Ajouter un utilisateur';
$errors = array();

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

if (!empty($_POST['submitted'])) {

  // Verirication XSS

  $nom = cleanXss($_POST['nom']);
  $prenom = cleanXss($_POST['prenom']);
  $date_naissance = cleanXss($_POST['date_naissance']);
  $civilite = cleanXss($_POST['civilite']);
  $role = cleanXss($_POST['role']);
  $email = cleanXss($_POST['email']);
  $password = cleanXss($_POST['password']);
  $confirmPassword = cleanXss($_POST['confirmPassword']);

  //Verif not empty

  if(!empty($nom)) {
      if(mb_strlen($nom) < 2) {
          $errors['nom'] = 'Veuillez entrer un nom valide (2 caracteres minimum)';
      }
  } else {
      $errors['nom'] = 'Veuillez renseignez ce champ';
  }

  if(!empty($prenom)) {
      if(mb_strlen($prenom) < 2) {
          $errors['prenom'] = 'Veuillez entrer un prenom valide (2 caracteres minimum)';
      }
  } else {
      $errors['prenom'] = 'Veuillez renseignez ce champ';
  }

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

  if(!empty($date_naissance)) {
      if(mb_strlen($date_naissance) != 10) {
          $errors['date_naissance'] = 'Veuillez entrer un date_naissance valide ';
      } else {
          $am = date('Y');
          $an = explode('-', $date_naissance);
          $age = ($am - $an[0]);
          $date_naissance = date("d-m-Y", strtotime($date_naissance));
      }
  } else {
      $errors['date_naissance'] = 'Veuillez renseignez ce champ';
  }

  if(!empty($civilite)) {
    if ($civilite == 'monsieur' || $civilite == 'madame') {
    } else {
      $errors['civilite'] = 'Veuillez selectionner une civilité valide';
    }
  } else {
      $errors['civilite'] = 'Veuillez renseignez ce champ';
  }

  if(!empty($role)) {
    if ($role == 'role_user' || $role == 'role_admin') {
    } else{
      $errors['role'] = 'Veuillez selectionner un role valide';
    }
  } else {
      $errors['role'] = 'Veuillez renseignez ce champ';
  }

  if (!empty($password) && !empty($confirmPassword)) {
    if (mb_strlen($password) < 6) {
      $errors['password'] = 'Veuillez renseigner au minimum 6 caractères';
    } elseif ($confirmPassword != $password) {
      $errors['confirmPassword'] = 'Les mots de passe ne correspondent pas';
    }
  } else {
    $errors['password'] = 'Veuillez renseigner ce/ces champs';
  }


  if (count($errors) == 0) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO vl_users (nom,prenom,password,email,date_naissance,created_at,civilite,role,age)
            VALUES (:nom,:prenom,:passwordHash,:email,:date_naissance,NOW(),:civilite,:role,:age)";
    $query = $pdo->prepare($sql);
    $query->bindValue(':nom',$nom,PDO::PARAM_STR);
    $query->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $query->bindValue(':passwordHash',$passwordHash,PDO::PARAM_STR);
    $query->bindValue(':email',$email,PDO::PARAM_STR);
    $query->bindValue(':date_naissance',$date_naissance,PDO::PARAM_STR);
    $query->bindValue(':civilite',$civilite,PDO::PARAM_STR);
    $query->bindValue(':role',$role,PDO::PARAM_STR);
    $query->bindValue(':age',$age,PDO::PARAM_STR);
    $query->execute();
    header('location: manage-user.php?success=yes');
  }

}

include('inc/header-back.php');
 ?>

    <div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="row text-center justify-content-right">
      <div class="ml-4">
        <a href="manage-user.php" class="btn btn-outline-primary">Retour</a>
      </div>
      <div class="ml-4">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>
      </div>
    </div>

    <form action="add-user.php" method="post">

      <div class="row mb-3">
        <div class="col">
          <input type="text" name="nom" id="nom" class="form-control <?php if(count($errors['nom']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($nom)){echo 'value="'. $nom .'"';} else {echo 'placeholder="Nom"';} ?>>
          <div class="invalid-feedback">
            <?php echo $errors['nom']; ?>
          </div>
        </div>
        <div class="col">
          <input type="text" name="prenom" id="prenom" class="form-control <?php if(count($errors['prenom']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($prenom)){echo 'value="'. $prenom .'"';} else {echo 'placeholder="Prenom"';} ?>>
          <div class="invalid-feedback">
            <?php echo $errors['prenom']; ?>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <input type="email" name="email" id="email" class="form-control <?php if(count($errors['email']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($email)){echo 'value="'. $email .'"';} else {echo 'placeholder="Email"';} ?>>
          <div class="invalid-feedback">
            <?php echo $errors['email']; ?>
          </div>
        </div>
        <div class="col">
          <input type="date" name="date_naissance" id="date_naissance" class="form-control <?php if(count($errors['date_naissance']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($date_naissance)){echo 'value="'. $date_naissance .'"';} else {echo 'placeholder="Date de naissance"';} ?>>
          <div class="invalid-feedback">
            <?php echo $errors['date_naissance']; ?>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <select class="form-control <?php if(count($errors['civilite']) != 0) { echo 'is-invalid';} ?>" name="civilite" id="civilite" >
            <option value="default" <?php if(empty($_POST['civilite'])){ echo 'selected'; } ?>>--Civilité--</option>
            <option value="monsieur" <?php if(!empty($_POST['civilite']) && $_POST['civilite'] == 'monsieur'){ echo 'selected'; } ?>>Monsieur</option>
            <option value="madame" <?php if(!empty($_POST['civilite']) && $_POST['civilite'] == 'madame'){ echo 'selected'; } ?>>Madame</option>
          </select>
          <div class="invalid-feedback">
            <?php echo $errors['civilite']; ?>
          </div>
        </div>
        <div class="col">
          <select class="form-control <?php if(count($errors['role']) != 0) { echo 'is-invalid';} ?>" name="role" id="role" >
            <option value="default" <?php if(empty($_POST['role'])){ echo 'selected'; } ?>>--Role--</option>
            <option value="role_user" <?php if(!empty($_POST['role']) && $_POST['role'] == 'role_user'){ echo 'selected'; } ?>>Utilisateur</option>
            <option value="role_admin" <?php if(!empty($_POST['role']) && $_POST['role'] == 'role_admin'){ echo 'selected'; } ?>>Administrateur</option>
          </select>
          <div class="invalid-feedback">
            <?php echo $errors['role']; ?>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <input type="password" name="password" id="password" class="form-control <?php if(count($errors['password']) != 0) { echo 'is-invalid';} ?>" placeholder="Mot de passe">
          <div class="invalid-feedback">
            <?php echo $errors['password']; ?>
          </div>
        </div>
        <div class="col">
          <input type="password" name="confirmPassword" id="confirmPassword" class="form-control <?php if(count($errors['confirmPassword']) != 0) { echo 'is-invalid';} ?>" placeholder="Confirmer mot de passe">
          <div class="invalid-feedback">
            <?php echo $errors['confirmPassword']; ?>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <input type="submit" name="submitted" value="Ajouter utilisateur" class="btn btn-primary">
      </div>


    </form>





    </div>
    <!-- /.container-fluid -->

<?php
include('inc/footer-back.php');

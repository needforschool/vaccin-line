<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
isAdmin();

$title = 'Ajouter un vaccin';
$errors = array();

if (!empty($_POST['submitted'])) {
  // die('ok');
  //protection Faille XSS
  $maladie       = cleanXss($_POST['maladie']);
  $descriptif    = cleanXss($_POST['descriptif']);
  $danger   = cleanXss($_POST['danger']);
  $obligatoire   = cleanXss($_POST['obligatoire']);
  $expiration    = cleanXss($_POST['expiration']);

  // validation message (min, max)
  $errors = validationText($errors,$maladie,'maladie',5,2000);
  $errors = validationText($errors,$descriptif,'descriptif',5,2000);

  if(!empty($danger)) {
    if ($danger == 'benin' || $danger == 'modéré' || $danger == 'mortelle') {
    } else {
      $errors['danger'] = 'Veuillez selectionner un danger valide';
    }
  } else {
    $errors['danger'] = 'Veuillez renseignez ce champ';
  }

  if(!empty($obligatoire)) {
    if ($obligatoire == 'oui' || $obligatoire == 'non') {
    } else {
      $errors['obligatoire'] = 'Veuillez selectionner une obligation valide';
    }
  } else {
    $errors['obligatoire'] = 'Veuillez renseignez ce champ';
  }

  if(!empty($expiration)) {
    if ($expiration == '15778800' || $expiration == '31557600' || $expiration == '63115200' || $expiration == '157788000' || $expiration == '315576000' || $expiration == '631152000') {
    } else {
      $errors['expiration'] = 'Veuillez selectionner une expiration valide';
    }
  } else {
    $errors['expiration'] = 'Veuillez renseignez ce champ';
  }

  if(count($errors) == 0) {

    $sql = "INSERT INTO vl_vaccins (maladie,descriptif,obligatoire,danger,expiration) VALUES (:maladie,:description,:obligatoire,:danger,:expiration)";
    $query = $pdo->prepare($sql);
    $query->bindValue(':maladie',$maladie,PDO::PARAM_STR);
    $query->bindValue(':description',$descriptif,PDO::PARAM_STR);
    $query->bindValue(':obligatoire',$obligatoire,PDO::PARAM_STR);
    $query->bindValue(':danger',$danger,PDO::PARAM_STR);
    $query->bindValue(':expiration',$expiration,PDO::PARAM_INT);
    $query->execute();

    //redirection
    // header('Location: manage-vaccin.php?success=yes');
  }

}

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

include('inc/header-back.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if(!empty($_GET['error']) && $_GET['error'] == 'yes'){ ?>
    <div class="alert alert-danger" role="alert">
      Erreur lors de l'envoi
    </div>
  <?php }elseif (!empty($_GET['error']) && $_GET['error'] == 'no') {?>
    <div class="alert alert-success" role="alert">
      L'ajout a été effectué
    </div>
  <?php  } ?>

  <a href="<?php if(!empty($_GET['id'])){echo 'single-vaccin.php?id='. $_GET['id'];}else{ echo 'manage-vaccin.php';} ?>" class="btn btn-outline-primary">Retour</a>

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-center text-gray-800"><?php echo mb_strtoupper($title); ?></h1>

  <form class="" action="add-vaccin.php" method="post">

    <div class="row">
      <div class="col">
        <input type="text" name="maladie" id="maladie" class="form-control <?php if(!empty($errors) && count($errors['maladie']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($_POST['maladie'])){echo 'value="'. $_POST['maladie'] .'"';} else {echo 'placeholder="maladie"';} ?>>
        <div class="invalid-feedback">
          <?php echo $errors['maladie']; ?>
        </div>
      </div>
      <div class="col">
        <select class="form-control <?php if(!empty($errors) && count($errors['danger']) != 0) { echo 'is-invalid';} ?>" name="danger" id="danger" >
          <option value="default" <?php if(empty($_POST['danger'])){ echo 'selected'; } ?>>--danger--</option>
          <option value="benin" <?php if(!empty($_POST['danger']) && $_POST['danger'] == 'benin'){ echo 'selected'; } ?>>Benin</option>
          <option value="modéré" <?php if(!empty($_POST['danger']) && $_POST['danger'] == 'modéré'){ echo 'selected'; } ?>>Modéré</option>
          <option value="mortelle" <?php if(!empty($_POST['danger']) && $_POST['danger'] == 'mortelle'){ echo 'selected'; } ?>>Mortelle</option>
        </select>
        <div class="invalid-feedback">
          <?php echo $errors['danger']; ?>
        </div>
      </div>
      <div class="col">
        <select class="form-control <?php if(!empty($errors) && count($errors['obligatoire']) != 0) { echo 'is-invalid';} ?>" name="obligatoire" id="obligatoire" >
          <option value="default" <?php if(empty($_POST['obligatoire'])){ echo 'selected'; } ?>>--Obligatoire--</option>
          <option value="oui" <?php if(!empty($_POST['obligatoire']) && $_POST['obligatoire'] == 'oui'){ echo 'selected'; } ?>>Oui</option>
          <option value="non" <?php if(!empty($_POST['obligatoire']) && $_POST['obligatoire'] == 'non'){ echo 'selected'; } ?>>Non</option>
        </select>
        <div class="invalid-feedback">
          <?php echo $errors['obligatoire']; ?>
        </div>
      </div>
      <div class="col">
        <select class="form-control <?php if(!empty($errors) && count($errors['expiration']) != 0) { echo 'is-invalid';} ?>" name="expiration" id="expiration" >
          <option value="default" <?php if(empty($_POST['expiration'])){ echo 'selected'; } ?>>--Expiration--</option>
          <option value="15778800" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '15778800'){ echo 'selected'; } ?>>6 mois</option>
          <option value="31557600" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '31557600'){ echo 'selected'; } ?>>1 an</option>
          <option value="63115200" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '63115200'){ echo 'selected'; } ?>>2 ans</option>
          <option value="157788000" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '157788000'){ echo 'selected'; } ?>>5 ans</option>
          <option value="315576000" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '315576000'){ echo 'selected'; } ?>>10 ans</option>
          <option value="631152000" <?php if(!empty($_POST['expiration']) && $_POST['expiration'] == '631152000'){ echo 'selected'; } ?>>20 ans</option>
        </select>
        <div class="invalid-feedback">
          <?php echo $errors['expiration']; ?>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <textarea name="descriptif" style="resize: none; height: 200px;" class="form-control <?php if(!empty($errors) && count($errors['descriptif']) != 0) { echo 'is-invalid';} ?> mt-3" id="descriptif" placeholder="le descriptif de la maladie" required></textarea>
      <div class="invalid-feedback">
        <?php echo $errors['descriptif']; ?>
      </div>
    </div>

    <input type="submit" name="submitted" value="Ajouter" class="btn btn-primary">

  </form>

</div>
<!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

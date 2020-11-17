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
  $dangerosité   = cleanXss($_POST['dangerosité']);
  $obligatoire   = cleanXss($_POST['obligatoire']);
  // validation message (min, max)
  $errors = validationText($errors,$maladie,'maladie',5,2000);
  $errors = validationText($errors,$descriptif,'descriptif',5,2000);
  // if no errors :
  if(count($errors) == 0) {
    // INSERT INTO
    $sql = "INSERT INTO vl_vaccins (maladie,descriptif,dangerosité,obligatoire)
    VALUES  (:maladie,:descriptif,:dangerosité,:obligatoire)";
    $query = $pdo->prepare($sql);
    $query->bindValue(':maladie',$maladie,PDO::PARAM_STR);
    $query->bindValue(':descriptif',$descriptif,PDO::PARAM_STR);
    $query->bindValue(':dangerosité',$dangerosité,PDO::PARAM_STR);
    $query->bindValue(':obligatoire',$obligatoire,PDO::PARAM_STR);
    $query->execute();
    //redirection
    header('Location: manage-vaccin.php');
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

  <form class="" action="reply-mail.php<?php if(!empty($_GET['id'])){echo '?id='. $_GET['id'];} ?>" method="post">

    <div class="row">
      <div class="col">
        <input type="text" name="maladie" id="maladie" class="form-control <?php if(count($errors['maladie']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($maladie)){echo 'value="'. $vaccin['maladie'] .'"';} else {echo 'placeholder="maladie"';} ?>>
        <div class="invalid-feedback">
          Veuillez remplir correctement ce champ.
        </div>
      </div>
      <div class="col">
        <select class="form-control <?php if(count($errors['dangerosité']) != 0) { echo 'is-invalid';} ?>" name="dangerosité" id="dangerosité" >
          <option value="default" <?php if(empty($_POST['dangerosité'])){ echo 'selected'; } ?>>--Dangerosité--</option>
          <option value="benin" <?php if(!empty($_POST['dangerosité']) && $_POST['dangerosité'] == 'benin'){ echo 'selected'; } ?>>Benin</option>
          <option value="modéré" <?php if(!empty($_POST['dangerosité']) && $_POST['dangerosité'] == 'modéré'){ echo 'selected'; } ?>>Modéré</option>
          <option value="mortelle" <?php if(!empty($_POST['dangerosité']) && $_POST['dangerosité'] == 'mortelle'){ echo 'selected'; } ?>>Mortelle</option>
        </select>
        <div class="invalid-feedback">
          <?php echo $errors['dangerosité']; ?>
        </div>
      </div>
      <div class="col">
        <select class="form-control <?php if(count($errors['obligatoire']) != 0) { echo 'is-invalid';} ?>" name="obligatoire" id="obligatoire" >
          <option value="default" <?php if(empty($_POST['obligatoire'])){ echo 'selected'; } ?>>--Obligatoire--</option
          <option value="oui" <?php if(!empty($_POST['obligatoire']) && $_POST['obligatoire'] == 'oui'){ echo 'selected'; } ?>>Oui</option>
          <option value="non" <?php if(!empty($_POST['obligatoire']) && $_POST['obligatoire'] == 'non'){ echo 'selected'; } ?>>Non</option>
        </select>
        <div class="invalid-feedback">
          <?php echo $errors['obligatoire']; ?>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <textarea name="descriptif" style="resize: none; height: 200px;" class="form-control <?php if(count($errors['descriptif']) != 0) { echo 'is-invalid';} ?> mt-3" id="descriptif" placeholder="le descriptif de la maladie" required></textarea>
      <div class="invalid-feedback">
        Veuillez remplir correctement ce champ.
      </div>
    </div>

    <input type="submit" name="submitted" value="Ajouter" class="btn btn-primary">

  </form>

</div>
<!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

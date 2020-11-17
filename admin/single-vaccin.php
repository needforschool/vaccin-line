<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
isAdmin();
$title = 'option vaccin';

$sql = "SELECT * FROM vl_vaccins WHERE id = :id";
$query = $pdo->prepare($sql);
$query->execute();
$singleVaccin = $query->fetchAll();

include('inc/header-back.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="manage-vaccin.php" class="btn btn-outline-primary">Retour</a>

  <h1 class="text-center h3 mb-4 text-gray-800"><?php echo $title ?></h1>

  <div class="row">

    <div class="col-lg-8">

      <div class="col-xl-10 col-md-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">maladie : <?php echo $singleVaccin['maladie'] ?></h6>
          </div>
          <div class="card-body">
            <p><?php echo $singleVaccin['descriptif'] ?></p>
          </div>
        </div>
      </div>

      <a href="manage-vaccin.php?id=<?php echo $id ?>" class="btn btn-warning btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="text">Modifier</span>
      </a>

    </div>
    <div class="col-lg-4 justify-content-center">

      <div class="col-xl col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  Dangerosité
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($singleVaccin['dangerosité'] == 'mortelle'){ echo 'class="text-danger"' ;}elseif($singleVaccin$singleVaccin['dangerosité'] == 'modéré'){echo 'class="text-warning"' ;}elseif($singleVaccin['dangerosité'] == 'benin'){echo 'class="text-success"' ;} ?> ><?php echo ucfirst($singleVaccin['dangerosité']); ?>
                </div>
                <div class="col-auto">
                  <i class="fas fa-birthday-cake fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    obligatoire</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $singleVaccin['obligatoire'] ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <a href="delete-mail.php?id=<?php echo $singleVaccin['id']; ?>"  class="btn btn-danger ml-3 btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-trash"></i>
            </span>
            <span class="text">Supprimer vaccin</span>
          </a>

        </div>

      </div>

    </div>
    <!-- /.container-fluid -->



    <?php
    include('inc/footer-back.php');

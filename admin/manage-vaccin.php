<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
} elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
}
$title = 'Gestion Vaccin';

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

$sql = "SELECT * FROM vl_vaccins ORDER BY id";
$query = $pdo->prepare($sql);
$query->execute();
$vaccins = $query->fetchAll();

include('inc/header-back.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php if(!empty($_GET['success']) && $_GET['success'] == 'no'){ ?>
    <div class="alert alert-danger" role="alert">
      Erreur lors de l'ajout du vaccin
    </div>
  <?php }elseif (!empty($_GET['success']) && $_GET['success'] == 'yes') {?>
    <div class="alert alert-success" role="alert">
      Le vaccin a été ajouté
    </div>
  <?php } ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

  <!-- /.container-fluid -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">liste des vaccins</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <a href="add-vaccin.php" class="btn btn-secondary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
          </span>
          <span class="text">Ajouter un vaccin</span>
        </a>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>maladie</th>
              <th>descriptif</th>
              <th>dangerosité</th>
              <th>obligatoire</th>
              <th>Information</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>maladie</th>
              <th>descriptif</th>
              <th>dangerosité</th>
              <th>obligatoire</th>
              <th>Information</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($vaccins as $vaccin): ?>
              <tr>
                <th><?php echo ucfirst($vaccin['maladie']); ?></th>
                <th><?php echo ucfirst($vaccin['descriptif']); ?></th>
                <th <?php if($vaccin['dangerosité'] == 'mortelle'){ echo 'class="text-danger"' ;}elseif($vaccin['dangerosité'] == 'modéré'){echo 'class="text-warning"' ;}elseif($vaccin['dangerosité'] == 'benin'){echo 'class="text-success"' ;} ?> ><?php echo ucfirst($vaccin['dangerosité']); ?></th>
                <th><?php echo ucfirst($vaccin['obligatoire']); ?></th>
                <th class="gerer">
                  <div class="my-2"></div>
                  <a href="single-vaccin.php?id=<?php echo $vaccin['id']; ?>" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Info</span>
                  </a>
                </div>
              </th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </div>
    </table>
  </div>
</div>

<?php
include('inc/footer-back.php');

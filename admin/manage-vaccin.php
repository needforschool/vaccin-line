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

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

<<<<<<< HEAD
  <!-- /.container-fluid -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Liste de vaccins</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="active-cyan-3 active-cyan-4 mb-4">
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>maladie</th>
              <th>descriptif</th>
              <th>dangerosité</th>
              <th>obligatoire</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>maladie</th>
              <th>descriptif</th>
              <th>dangerosité</th>
              <th>obligatoire</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($vaccins as $vaccin): ?>
              <tr>
                <th><?php echo ucfirst($vaccin['maladie']); ?></th>
                <th><?php echo ucfirst($vaccin['descriptif']); ?></th>
                <th <?php if($vaccin['dangerosité'] == 'mortelle'){ echo 'class="text-danger"' ;}elseif($vaccin['dangerosité'] == 'modéré'){echo 'class="text-warning"';}elseif($vaccin['dangerosité'] == 'benin'){echo 'class="text-success"' ;} ?> ><?php echo ucfirst($vaccin['dangerosité']);?></th>
                <th><?php echo ucfirst($vaccin['obligatoire']); ?></th>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <nav aria-label="...">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
=======
</div>
<!-- /.container-fluid -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      <label for="vaccin-search">Search:</label>
    <input type="search" id="vaccin-search" name="vaccin-search">
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>maladie</th>
            <th>descriptif</th>
            <th>dangerosité</th>
            <th>obligatoire</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>maladie</th>
            <th>descriptif</th>
            <th>dangerosité</th>
            <th>obligatoire</th>
          </tr>
        </tfoot>
        <tbody>
          <?php foreach ($vaccins as $vaccin): ?>
          <tr>
            <th><?php echo ucfirst($vaccin['maladie']); ?></th>
            <th><?php echo ucfirst($vaccin['descriptif']); ?></th>
            <th <?php if($vaccin['dangerosité'] == 'mortelle'){ echo 'class="text-danger"' ;}elseif($vaccin['dangerosité'] == 'modéré'){echo 'class="text-warning"' ;}elseif($vaccin['dangerosité'] == 'benin'){echo 'class="text-success"' ;} ?> ><?php echo ucfirst($vaccin['dangerosité']); ?></th>
            <th><?php echo ucfirst($vaccin['obligatoire']); ?></th>
          </tr>
          <?php endforeach ?>
        </tbody>
>>>>>>> ff578429e706851d2d750c45a50e17e40248c0ed
    </div>
  </div>
</div>
<?php
include('inc/footer-back.php');

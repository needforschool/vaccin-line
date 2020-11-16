<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
isAdmin();
$title = 'Gestion utilisateur';
$trier = 1;

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

if(!empty($_POST['submitted'])) {
  $trier = cleanXss($_POST['tri']);
}

  if(!empty($trier) && $trier == 2) {
    $sql = "SELECT * FROM vl_users WHERE status = 1 ORDER BY created_at ASC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $users = $query->fetchAll();
  } elseif ($trier == 1) {
      $sql = "SELECT * FROM vl_users WHERE status = 1 ORDER BY created_at DESC";
      $query = $pdo->prepare($sql);
      $query->execute();
      $users = $query->fetchAll();
    }

include('inc/header-back.php');
 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">


      <?php if(!empty($_GET['success']) && $_GET['success'] == 'no'){ ?>
        <div class="alert alert-danger" role="alert">
          Erreur lors de l'ajout de l'utilisateur
        </div>
      <?php }elseif (!empty($_GET['success']) && $_GET['success'] == 'yes') {?>
        <div class="alert alert-success" role="alert">
          L'utilisateur a été ajouté
        </div>
      <?php } ?>

      <div class="row text-center justify-content-between">
        <div class="">
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>
        </div>
        <div class="">
          <form class="mb-3" action="manage-user.php" method="post">
            <select name="tri" id="tri" class="btn btn-light">
              <option value="1" selected>Trier par</option>
              <option value="1">Le plus récent</option>
              <option value="2">Le plus ancien</option>
            </select>
            <input class="btn btn-outline-primary" type="submit" name="submitted" value="Trier">
          </form>
        </div>
        <div class="">
          <a href="add-user.php" class="btn btn-outline-primary">Ajouter un utilisateur</a>
        </div>
      </div>

        <!-- Page Heading -->

        <div class="d-flex flex-wrap justify-content-between">

          <?php foreach ($users as $user) :?>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="single-user.php?id=<?php echo $user['id'] ?>"><?php echo mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']);?></a> <?php if ($user['role'] == 'role_admin') {echo ' <i class="fas fa-user-cog" style="color: #ff6b6b;"></i>';}?></h6>
                </div>
                <div class="card-body">
                  <p>Date de naissance : <?php echo ucfirst($user['date_naissance']); ?></p>
                  <p>Civilité : <?php echo ucfirst($user['civilite']); ?></p>
                  <a href="single-user.php?id=<?php echo $user['id'] ?>" class="btn btn-info btn-circle">
                      <i class="fas fa-info-circle"></i>
                  </a>
                  <!-- <a  href="#" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-circle">
                      <i class="fas fa-trash"></i>
                  </a> -->
                </div>
              </div>
            </div>
          <?php endforeach ;?>



        </div>


    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

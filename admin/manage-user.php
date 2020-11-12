<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
  } elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
  }
$title = 'Gestion utilisateur';

$sql = "SELECT * FROM vl_users WHERE status = 1";
$query = $pdo->prepare($sql);
$query->execute();
$users = $query->fetchAll();

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

      <?php if(!empty($_GET['error']) && $_GET['error'] == 'yes'){ ?>
        <div class="alert alert-danger" role="alert">
          Erreur lors de la suppresion de l'utilisateur
        </div>
      <?php }elseif (!empty($_GET['error']) && $_GET['error'] == 'no') {?>
        <div class="alert alert-success" role="alert">
          L'utilisateur a été supprimé
        </div>
    <?php  } ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

        <div class="d-flex flex-wrap justify-content-between">

          <?php foreach ($users as $user) :?>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="single-user.php?id=<?php echo $user['id'] ?>"><?php echo mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']);?></a><?php if ($user['role'] == 'role_admin') {echo ' <i class="fas fa-user-cog" style="color: #ff6b6b;"></i>';}?> </h6>
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

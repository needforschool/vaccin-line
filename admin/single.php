<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
  } elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
  }

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $user = $query->fetch();
}

$title = mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']);

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="text-center h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

        <a href="#" data-href="#" data-toggle="modal" data-target="#confirm-delete"  class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Split Button Danger</span>
        </a>

    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
  } elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
  }
$title = 'Blank';

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

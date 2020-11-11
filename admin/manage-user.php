<?php
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
} elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
} else {
  $admin = true;
}
$title = 'Manage user';

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

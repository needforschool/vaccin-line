<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');

$title = '403 Forbidden acces';

include('inc/header-back.php');
 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- 404 Error Text -->
      <div class="text-center">
          <div class="error mx-auto" data-text="403">403</div>
          <p class="lead text-gray-800 mb-5">Forbidden acces</p>
          <p class="text-gray-500 mb-0">You can't go there, please go home</p>
          <a href="../index.php">&larr; Back to Home</a>
      </div>

    </div>
    <!-- /.container-fluid -->
<?php
include('inc/footer-back.php');

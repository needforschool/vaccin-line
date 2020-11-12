<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
  } elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
  }
$title = 'Boite mail';

$sql = "SELECT * FROM vl_contacts WHERE status = 1 ORDER BY created_at DESC";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

      <?php if(!empty($_GET['error']) && $_GET['error'] == 'yes'){ ?>
        <div class="alert alert-danger" role="alert">
          Erreur lors de la suppresion du mail
        </div>
      <?php }elseif (!empty($_GET['error']) && $_GET['error'] == 'no') {?>
        <div class="alert alert-success" role="alert">
          Le mail a été supprimé
        </div>
    <?php  } ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>From</th>
                            <th>Object</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($contacts as $contact): ?>
                      <tr>
                        <th><?php if($contact['lu'] == 'oui'){ echo '<i class="fas fa-bookmark" title="Lu"></i>'; } elseif($contact['lu'] == 'non'){ echo '<i class="far fa-bookmark" title="Non lu"></i>'; }?> - <a href="single-mail.php?id=<?php echo $contact['id'] ?>"><?php echo ucfirst($contact['email']); ?></a></th>
                        <th><?php echo ucfirst($contact['object']); ?></th>
                        <th><?php echo date('d/m h:i', strtotime($contact['created_at'])); ?></th>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

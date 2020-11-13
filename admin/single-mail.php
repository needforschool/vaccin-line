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

if (!empty($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_contacts WHERE status = 1 AND id = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $mail = $query->fetch();

  $sql = "UPDATE vl_contacts SET lu = 'oui' WHERE ID = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();

  $sql = "SELECT * FROM vl_users WHERE email = :email";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':email', $mail['email'], PDO::PARAM_STR);
  $query->execute();
  $user = $query->fetch();

  if (!empty($user)) {
    $userLogin = true;
  }else {
    $userLogin = false;
  }
}

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <a href="list-mail.php" class="btn btn-outline-primary">Retour</a>

        <h1 class="text-center h3 mb-4 text-gray-800"><?php echo $title ?></h1>

        <div class="row">

          <div class="col-lg-8">

            <div class="col-xl-10 col-md-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Objet : <?php echo $mail['object'] ?></h6>
                </div>
                <div class="card-body">
                  <p><?php echo $mail['message'] ?></p>
                </div>
              </div>
            </div>

            <a href="reply-mail.php?id=<?php echo $id ?>" class="btn btn-primary ml-3 mb-2 btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-reply"></i>
              </span>
              <span class="text">Répondre</span>
            </a>

        </div>
        <div class="col-lg-4 justify-content-center">

          <div class="col-xl col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      mail par</div>
                      <div class="<?php if($userLogin){ echo 'h5';} else {echo 'h6';} ?> mb-0 font-weight-bold text-gray-800"><?php if($userLogin){echo mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']);} else {echo $mail['email'];} ?></div>
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
                        Envoyé le</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo date('d/m/Y à h:i', strtotime($mail['created_at'])) ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <a href="delete-mail.php?id=<?php echo $mail['id']; ?>"  class="btn btn-danger ml-3 btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-trash"></i>
                </span>
                <span class="text">Supprimer mail</span>
              </a>

        </div>

      </div>

    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

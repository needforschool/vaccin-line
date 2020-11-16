<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
isAdmin();

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_users WHERE id = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $user = $query->fetch();

  $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $userVaccin = $query->fetchAll();

}

$title = mb_strtoupper($user['nom']) . ' ' . ucfirst($user['prenom']);

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <a href="manage-user.php" class="btn btn-outline-primary">Retour</a>

        <h1 class="text-center h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

        <div class="row justify-content-around">

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                  Nombre de vaccin</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($userVaccin); ?></div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-syringe fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                  Age</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user['age'] ?></div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-birthday-cake fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                  Civilité</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo mb_strtoupper($user['civilite']) ?></div>
                          </div>
                          <div class="col-auto">
                            <?php if ($user['civilite'] == 'monsieur') {?>
                              <i class="fas fa-male fa-2x text-gray-300"></i>
                          <?php  } elseif ($user['civilite'] == 'madame') {?>
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        <?php  } ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        </div>

        <div class="row justify-content-around">

          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                  email</div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $user['email']; ?></div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-envelope fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                      <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                  membre depuis le</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo timeToMY($user['created_at']) ?></div>
                          </div>
                          <div class="col-auto">
                              <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <!-- Suppression d'un utilisateur -->
          <a href="#" data-href="#" data-toggle="modal" data-target="#confirm-delete"  class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-trash"></i>
            </span>
            <span class="text">Supprimer utilisateur</span>
          </a>

        </div>



    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

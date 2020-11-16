<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="icon" type="image/svg+xml" href="hand-holding-medical-solid.svg">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <i class="fas fa-hand-holding-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Vaccin'Line</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>

                <a class="nav-link" href="manage-user.php">
                    <i class="fas fa-user-md"></i>
                    <span>Gestion utilisateur</span></a>

                <a class="nav-link" href="manage-vaccin.php">
                    <i class="fas fa-syringe"></i>
                    <span>Gestion vaccin</span></a>

                <a class="nav-link" href="list-mail.php">
                    <i class="fas fa-envelope"></i>
                    <span>Boite mail</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                  <?php if (TotalNonLu($contacts) > 0 ): ?>
                                    <span class="badge badge-danger badge-counter"><?php echo TotalNonLu($contacts) ?></span>
                                  <?php endif; ?>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                  <?php if (TotalNonLu($contacts) > 0 ): ?>
                                    <?php echo TotalNonLu($contacts) ?>
                                  <?php else: ?>
                                    0
                                  <?php endif; ?>  Mail<?php if((TotalNonLu($contacts) > 1)) {echo 's';} ?> non lu
                                </h6>

                                <?php if (TotalNonLu($contacts) > 0 ): ?>
                                    <?php for($i = 0; $i < numberMail(TotalNonLu($contacts)); $i++){ ?>
                                      <?php if ($contacts[$i]['lu'] == 'non'): ?>
                                        <a class="dropdown-item d-flex align-items-center" href="single-mail.php?id=<?php echo $contacts[$i]['id']; ?>">
                                          <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="asset/img/undraw_profile_1.svg"
                                            alt="">
                                            <div class="status-indicator bg-success"></div>
                                          </div>
                                          <div class="font-weight-bold">
                                            <div class="text-truncate"><?php echo $contacts[$i]['object'] ?></div>
                                              <div class="small text-gray-500"><?php echo $contacts[$i]['email'] ?> · <?php echo date('d/m h:i', strtotime($contacts[$i]['created_at'])); ?></div>
                                            </div>
                                          </a>
                                      <?php endif; ?>
                                    <?php } ?>
                                <?php else: ?>

                                <?php endif; ?>
                                <a class="dropdown-item text-center small text-gray-500" href="list-mail.php">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']; ?></span>
                                <?php if ($_SESSION['user']['age'] < 25 && $_SESSION['user']['civilite'] == 'monsieur') {?>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile_2.svg">
                                  <?php } elseif ($_SESSION['user']['age'] > 25 && $_SESSION['user']['civilite'] == 'monsieur') {?>
                                    <img class="img-profile rounded-circle"
                                        src="asset/img/undraw_profile.svg">
                                <?php  } elseif ($_SESSION['user']['age'] < 25 && $_SESSION['user']['civilite'] == 'madame') {?>
                                  <img class="img-profile rounded-circle"
                                      src="asset/img/undraw_profile_1.svg">
                                  <?php }elseif ($_SESSION['user']['age'] > 25 && $_SESSION['user']['civilite'] == 'madame') {?>
                                    <img class="img-profile rounded-circle"
                                        src="asset/img/undraw_profile_3.svg">
                                    <?php } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="list-mail.php">
                                    <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Boite mail
                                </a>

                                <a class="dropdown-item" href="../index.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Retour accueil
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se deconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

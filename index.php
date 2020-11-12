<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
// $id = $_SESSION['user']['id'];
// debug($_SESSION);
// debug($_SESSION);


include('inc/header-front.php');

?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
<section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>the science of <br>feeling better</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a href="#">book a visit</a>
      </div>
      <div class="button">
        <div class="effect">
          <!-- effect btn -->
          <a href="#"  class="btn_inscription">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            inscription
          </a>
        </div>
        <div class="effect">
          <!-- effect btn -->
          <a href="#"  class="btn_connexion">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            connexion
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <section>
  <div class="wrap">
    <div class="BB">
      <?php
        // RECUPERATION ID VACCIN
        $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $vaccinsid = $query->fetchAll();
        $vaccins = array();
        $incre = 0 ;
        foreach ($vaccinsid as $vaccinid) {
          $vaccins[$incre] = $vaccinid['id_vaccin'] ;
          $incre += 1 ;
        }
        $incre = 0;
        // RECUPERATION INFO VACCIN VIA ID
        foreach ($vaccins as $vaccin) {
          $sql = "SELECT * FROM vl_vaccins WHERE id = $vaccin";
          $query = $pdo->prepare($sql);
          $query->execute();
          $vaccinsinfos[$incre] = $query->fetch();
          $incre += 1;
        }
        $incre = 1;
        // AFFICHAGE VACCINS
        foreach ($vaccinsinfos as $vaccininfo) {
          echo '<div class="MB MB'. $incre .'">';
            echo '<p>'. $vaccininfo['nom'] . '</p>';
            echo '<p>'. $vaccininfo['maladie'] . '</p>';
            echo '<p>'. $vaccininfo['descriptif'] . '</p>';
            echo '<p>'. $vaccininfo['renouveler_le'] . '</p>';
            echo '<p>'. $vaccininfo['expiration'] . '</p>';
          echo '</div>';
          $incre += 1;
        }
      ?>
      </div>
  </section>

<?php endif; ?>
<?php include('inc/footer-front.php');

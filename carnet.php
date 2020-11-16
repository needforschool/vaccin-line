<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Mon carnet';
$id = $_SESSION['user']['id'];
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
<?php if(!empty($_SESSION) ) : ?>
  <!-- Connecté -->
  <!-- RAPPEL VACCINs -->
  <section id="vaccins">
    <h1>Vos prochains rappels de vaccin :</h1>
    <br>
    <div class="BB_carnet">
      <?php
        $id = $_SESSION['user']['id'];
        // Recuperation des données de la table vl_vaccin
        $sql = "SELECT * FROM vl_vaccins";
        $query = $pdo->prepare($sql);
        $query->execute();
        $vaccins = $query->fetchAll();
        // Recuperation des données de la table vl_user_vaccin
        $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
        $user_vaccins = $query->fetchAll();
        $incre_fait_le = 0;
      ?>
      <?php if (!empty($user_vaccins)) : ?>
        <?php foreach($vaccins as $vaccin) : ?>
          <div class="MB_carnet">
            <p>Vaccin : <?php echo $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie']; ?></p>
            <p>Fait le : <?php echo $user_vaccins[$incre_fait_le]['fait_le']; ?></p>
            <?php if($vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] > 0) : ?> <p>Renouvelemnt : <?php echo vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] ; ?> </p> <?php endif; ?> 
          </div>
          <?php
            $incre_fait_le +=1;
            if($incre_fait_le == count($vaccin)) {
              break;
            }
          ?>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Vous n'avez pas de vaccin actuellement</p>
      <?php endif; ?>
      </div>
    </section>
<?php endif; ?>
<?php include('inc/footer-front.php');

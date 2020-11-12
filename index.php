<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
// debug($_SESSION);
// debug($_SESSION);

$errors = array();

include('inc/header-front.php');

if(!empty($_POST['submitted'])) {
  $vaccin = cleanXss($_POST['vaccin']);
  $date = cleanXss($_POST['date']);
  if(!empty($vaccin)) {

  } else {
    $errors['vaccin'] = 'Veuillez selectioner un vaccin';
  }
  if(!empty($date)) {

  } else {
    $errors['date'] = 'Veuillez renseignez ce champ'; 
  }
   
}

?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
<section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>Utiliser notre carnet ?</h1>
        <p>Le carnet de vaccination est un carnet dans lequel sont notées toutes les vaccinations d’une personne. Ce carnet est très pratique : il vous permet de savoir quelles vaccinations vous avez reçues et si vous êtes à jour de vos vaccinations. Il vous suffit donc de vous connecter et ne pas oublier de le présenter au professionnel de santé à chaque fois que vous vous faites vacciner. Il est valable toute la vie ! Pour l’obtenir, il suffit de vous <strong>inscrire</strong>. Il est gratuit.</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/medical.jpg" alt="">
      </div>
    </div>
    <div class="bigbox2">
      <div class="stats2">
        <h1>Pourquoi est-il important <br>de se faire vacciner ?</h1>
        <p>Se faire vacciner, c’est se protéger contre une série de maladies dont les complications peuvent être graves voire mortelles. Grâce à la vaccination, on évite de développer ces maladies et on diminue le risque de contaminer d’autres personnes. Se faire vacciner, c’est se protéger soi contre des maladies mais c’est aussi éviter de contaminer d’autres personnes. Réduire les possibilités de contamination est d’autant plus précieux que l’infection concernée est très contagieuse, comme la rougeole ou la grippe.</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/vaccin.jpg" alt="">
      </div>
    </div>
    <div class="bigbox3">
      <div class="stats3">
        <h1>Eviter la réapparition <br>de dangereuses maladies</h1>
        <p>Certaines maladies semblent avoir disparu en France, ou être devenues très rares. Cependant, la plupart des microbes qui causent ces maladies existent toujours, y compris sur notre territoire. La vaccination doit donc se poursuivre. Ces microbes restent une menace pour les personnes non protégées par la vaccination ou insuffisamment protégées.</p>
      </div>
      <div class="img-stats">
        <img src="asset/img/faux.jpg" alt="">
      </div>
    </div>
    <div class="button">
      <div class="effect">
        <!-- effect btn -->
        <a href="signin.php"  class="btn_inscription">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          inscription
        </a>
      </div>
      <div class="effect">
        <!-- effect btn -->
        <a href="login.php"  class="btn_connexion">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          connexion
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <section>
  <div class="wrap">
    <h3>Ajouter un vaccin :</h3>
    <form action="index.php" method="post">
    
      <select name="vaccin" id="vaccin">
        <option value="">--VACCIN--</option>
        <?php 
          $sql = "SELECT * FROM vl_vaccins ORDER BY maladie ASC";
          $query = $pdo->prepare($sql);
          $query->execute();
          $selects = $query->fetchAll();

          foreach($selects as $select) {
            echo '<option value="' . $select['maladie'].'">'. $select['maladie'] . '</option>';
          } 
          debug($selects);
        ?>
      </select>
      <span class="error"><?php if(!empty($errors['vaccin'])) { echo $errors['vaccin']; }?></span>
      <input type="date" name="date">
      <span class="error"><?php if(!empty($errors['date'])) { echo $errors['date']; }?></span>
      <input type="submit" name="submited">
    </form>
    <!-- RAPPEL VACCIN Vous pouvez modifier les class si vous voulez -->
    <h1>Vos prochains rappel de vaccin :</h1>
    <br>
    <div class="BB1">
      <?php
        $id = $_SESSION['user']['id'];

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
        $vaccinsinfos = array();
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
            echo '<p>'. $vaccininfo['maladie'] . '</p>';
            echo '<p>'. $vaccininfo['descriptif'] . '</p>';
            echo '<p>'. $vaccininfo['renouveler_le'] . '</p>';
            echo '<p>'. $vaccininfo['expiration'] . '</p>';
          echo '</div>';
          $incre += 1;
        }
      ?>
      </div>
      <br>
      <h1>Vos derniers vaccins :</h1>
      <br>
      <div class="BB2">

      <?php
        $id = $_SESSION['user']['id'];

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

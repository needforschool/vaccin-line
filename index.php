<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';

$errors = array();

include('inc/header-front.php');

if(!empty($_POST['ajoutvaccin'])) {
  $vaccin = cleanXss($_POST['vaccin']);
  $date = cleanXss($_POST['date']);
  $id_user = $_SESSION['user']['id'];

  if(!empty($vaccin)) {

  } else {
    $errors['vaccin'] = 'Veuillez selectioner un vaccin';
  }
  if(!empty($date)) {

  } else {
    $errors['date'] = 'Veuillez renseignez ce champ';
  }

  if(count($errors) == 0) {
    $sql = "INSERT INTO vl_user_vaccin (id_user,id_vaccin,fait_le)
    VALUES (:id_user,:vaccin,:date)";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_user',$id_user,PDO::PARAM_STR);
    $query->bindValue(':vaccin',$vaccin,PDO::PARAM_STR);
    $query->bindValue(':date',$date,PDO::PARAM_STR);
    $query->execute();
  }


}

?>


<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
<section>
  <div class="wrap-section">
    <div class="bigbox">
      <div class="stats">
        <h1>Comment utiliser notre carnet ?</h1>
        <p>Le carnet de vaccination est un carnet dans lequel sont notées toutes les vaccinations d’une personne. Ce carnet est très pratique : il vous permet de savoir quelles vaccinations vous avez reçues et si vous êtes à jour de vos vaccinations. Il vous suffit donc de vous connecter et ne pas oublier de le présenter au professionnel de santé à chaque fois que vous vous faites vacciner. Il est valable toute la vie ! Pour l’obtenir, il suffit de vous <a href="signin.php"><strong>inscrire</strong></a>. Il est gratuit.</p>
      </div>
    </div>
    <div class="bigbox2">
      <div class="stats2">
        <h1>Notre carnet est-il sécurisé ?</h1>
        <p>Se faire vacciner, c’est se protéger contre une série de maladies dont les complications peuvent être graves voire mortelles. Grâce à la vaccination, on évite de développer ces maladies et on diminue le risque de contaminer d’autres personnes. Se faire vacciner, c’est se protéger soi contre des maladies mais c’est aussi éviter de contaminer d’autres personnes. Réduire les possibilités de contamination est d’autant plus précieux que l’infection concernée est très contagieuse, comme la rougeole ou la grippe.</p>
      </div>
    </div>
    <div class="bigbox3">
      <div class="stats3">
        <h1>Eviter la réapparition <br>de dangereuses maladies</h1>
        <p>Certaines maladies semblent avoir disparu en France, ou être devenues très rares. Cependant, la plupart des microbes qui causent ces maladies existent toujours, y compris sur notre territoire. La vaccination doit donc se poursuivre. Ces microbes restent une menace pour les personnes non protégées par la vaccination ou insuffisamment protégées.</p>
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
  <div class="wrap-section">
    <!-- Formulaire ajout vaccin  -->
    <section id="addvaccin">
      <div class="wrap-section-add">
        <div class="form-add">
      <h2>Ajouter un vaccin :</h2>
      <form action="index.php" method="post" class>
        <select name="vaccin" id="vaccin">
          <option value="">--VACCIN--</option>
          <?php
          $sql = "SELECT * FROM vl_vaccins ORDER BY maladie ASC";
          $query = $pdo->prepare($sql);
          $query->execute();
          $selects = $query->fetchAll();

          foreach($selects as $select) {
            echo '<option value="' . $select['id'].'">'. $select['maladie'] . '</option>';
          }
          ?>
        </select>
        <span class="error"><?php if(!empty($errors['vaccin'])) { echo $errors['vaccin']; }?></span>
        <input type="date" name="date">
        <span class="error"><?php if(!empty($errors['date'])) { echo $errors['date']; }?></span>
        <input type="submit" name="ajoutvaccin">
      </form>
    </section>
    <!-- RAPPEL VACCINs -->
    <section id="vaccins">
      <h1>Vos prochains rappels de vaccin :</h1>
      <br>
      <div class="BB1">
        <?php
          $id = $_SESSION['user']['id'];
          // Recuperation des données de la table vl_vaccin
          $sql = "SELECT * FROM vl_vaccins";
          $query = $pdo->prepare($sql);
          $query->execute();
          $vaccins = $query->fetchAll();
          // Recuperation des données de la table vl_user_vaccin
          $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le ASC LIMIT 3";
          $query = $pdo->prepare($sql);
          $query->execute();
          $user_vaccins = $query->fetchAll();
          $incre_MB = 1;
          $incre_fait_le = 0;
          // debug($vaccins);
        ?>
        <?php foreach($vaccins as $vaccin) : ?>
          <div class="MB MB<?php echo $incre_MB; ?>" style="background-color:<?php if(condition); ?>;">
            <p>Vaccin : <?php echo $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie']; ?></p>
            <p>Fait le : <?php echo $user_vaccins[$incre_fait_le]['fait_le']; ?></p>
        <?php if($vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] > 0) : ?> <p>Renouvelemnt : <?php echo vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] ; ?> </p> <?php endif; ?>
          </div>
        <?php
          $incre_MB += 1;
          $incre_fait_le +=1;
          if($incre_fait_le > 2) {
            break;
          }
        ?>

      <?php endforeach; ?>
    </div>
    <br>
    <!-- derniers VACCINs -->
    <h1>Vos derniers vaccins :</h1>
    <br>
    <div class="BB2">
      <?php
      // Recuperation des données de la table vl_user_vaccin
      $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le DESC LIMIT 3";
      $query = $pdo->prepare($sql);
      $query->execute();
      $user_vaccins = $query->fetchAll();
      $incre_MB = 1;
      $incre_fait_le = 0;
      // Affichage des 3 derniers vaccin
      $incre_MB = 1;
      $incre_fait_le = 0;
      foreach ($vaccins as $vaccin) {
        echo '<div class="MB MB'. $incre_MB .'">';
          echo '<p> Vaccin : '. $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie'] . '</p>';
          echo '<p> Fait le : '. $user_vaccins[$incre_fait_le]['fait_le'] . '</p>';
        echo '</div>';
        $incre_MB += 1;
        $incre_fait_le +=1;
        if($incre_fait_le > 2) {
          break;
        }
      }
      ?>
    </div>
  </section>
  </div>
<?php endif; ?>
<?php include('inc/footer-front.php');

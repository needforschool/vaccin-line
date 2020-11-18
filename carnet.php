<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Mon carnet';
$id = $_SESSION['user']['id'];

// debug($_SESSION);
// debug($_SESSION);


include('inc/header-front.php');

$errors = array();

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

<?php endif; ?>
<?php if(!empty($_SESSION) ) : ?>
  <!-- Connecté -->
  <!-- RAPPEL VACCINs -->
<section id="carnet">
    <!-- Formulaire ajout vaccin  -->
  <div class="addvaccin">
    <form action="carnet.php" method="post" class="form-addvaccin">
      <h2>Ajouter un vaccin :</h1>
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
        <div class="w50">
          <input type="date" name="date">
          <span class="error"><?php if(!empty($errors['date'])) { echo $errors['date']; }?></span>
        </div>
        <div class="w50">
          <input type="submit" name="ajoutvaccin">
        </div>
    </form>
        </div>
    <!-- RAPPEL VACCINS -->
    <div class="vaccins">
      <div class="rappel">


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
          $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le ASC";
          $query = $pdo->prepare($sql);
          $query->execute();
          $user_vaccins = $query->fetchAll();
          $incre_MB = 1;
          $incre_fait_le = 0;
        ?>
        <?php if(!empty($user_vaccins)) : ?>
          <?php foreach($vaccins as $vaccin) : ?>
            <div class="MB MB<?php echo $incre_MB; ?>" style="background-color:<?php if(c); ?>;">
              <p>Vaccin : <?php echo $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie']; ?></p>
              <p>Fait le : <?php echo $user_vaccins[$incre_fait_le]['fait_le']; ?></p>
            <?php if($vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] > 0) : ?> <p>Renouvelemnt : <?php echo vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] ; ?> </p> <?php endif; ?>
            </div>
            <?php
              $incre_MB += 1;
              $incre_fait_le +=1;
              if($incre_fait_le == count($user_vaccins)) {
                break;
              }
            ?>
          <?php endforeach; ?>
        <?php else : ?>
          <p class="pasdevaccin">Vous n'avez pas de vaccin</p>
        <?php endif;?>        
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
          if (!empty($user_vaccins)) { 
            foreach ($vaccins as $vaccin) {
              echo '<div class="MB MB'. $incre_MB .'">';
                echo '<p> Vaccin : '. $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie'] . '</p>';
                echo '<p> Fait le : '. $user_vaccins[$incre_fait_le]['fait_le'] . '</p>';
              echo '</div>';
              $incre_MB += 1;
              $incre_fait_le +=1;
              if($incre_fait_le == count($user_vaccins)) {
                break;
              }
            }
          } else {
            echo '<p class="pasdevaccin"> Vous n\'avez pas de vaccin actuelement </p>';
          }
        ?>

      </div>
      </div>
        </div>
        <div class="vaccins">
        <div class="rappel"> 
        <h1>Vos vaccins :</h1>
      <?php
        $id = $_SESSION['user']['id'];
        // Recuperation des données de la table vl_user_vaccin
        $sql = "SELECT * FROM vl_user_vaccin WHERE id_user = $id ORDER BY fait_le ASC";
        $query = $pdo->prepare($sql);
        $query->execute();
        $user_vaccins = $query->fetchAll();
        $incre_fait_le = 0;
      ?>
      <?php if (!empty($user_vaccins)) : ?>

        <div class="BB_carnet">
          <?php foreach($vaccins as $vaccin) : ?>
            <div class="MB_carnet">
              <p>Vaccin : <?php echo $vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['maladie']; ?></p>
              <p>Fait le : <?php echo $user_vaccins[$incre_fait_le]['fait_le']; ?></p>
              <?php if($vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] > 0) : ?> 
                <p>Renouvelemnt : <?php echo vaccins[($user_vaccins[$incre_fait_le]['id_vaccin'] - 1)]['expiration'] ; ?> </p>
              <?php endif; ?> 
            </div>
            <?php
              $incre_fait_le +=1;
              if($incre_fait_le == count($user_vaccins)) {
                break;
              }
            ?>
          <?php endforeach; ?>
        </div>

      <?php else : ?>
        <p class="pasdevaccin">Vous n'avez pas de vaccins actuellement</p>
      <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php 
  // include('inc/footer-front.php');

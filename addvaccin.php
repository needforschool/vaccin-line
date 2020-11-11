<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Home';
debug($_SESSION);

include('inc/header-front.php');

?>

</script>
<!-- Non connecté -->
<?php if(empty($_SESSION) ) : ?>
    
<?php endif; ?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <section>
    
    <form action="addvaccin.php" method="post">
    
      <select name="vaccin" id="vaccin">
        <option value="">--Vaccin--</option>
        <?php 
          $sql = "SELECT * FROM vl_vaccins";
          $query = $pdo->prepare($sql);
          $query->execute();
          $vaccins = $query->fetchAll();

          foreach ($vaccins as $vaccin) {
            echo '<option value="'.$vaccin['nom'].'">'.$vaccin['nom'].'</option>';
        }
        ?>

      </select>

    </form>
    
  </section>

<?php endif; ?>
<?php include('inc/footer-front.php');
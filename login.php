<?php
$title = 'Connexion';
session_start();
include('inc/pdo.php');
include('inc/function.php');

include('inc/header-front.php');

$success = false;
$errors = array();

if (!empty($_POST['submitted'])) {
    $email = cleanXss($_POST['email']);
    $password = cleanXss($_POST['password']);
    if(!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM vl_users WHERE email = :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email,PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if(!empty($user)) {
            if ((password_verify($password, $user['password']))){
                $_SESSION['user'] = array(
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'date_naissance' => $user['date_naissance'],
                    'age' => $user['age'],
                    'email' => $user['email'],
                    'civilite' => $user['civilite'],
                    'role' => $user['role'],
                    'ip' => $_SERVER['REMOTE_ADDR']
                );
                $success = true;
                if ($user['role'] == 'role_admin') {
                    header('Location: admin/index.php');
                    die();
                } elseif ($user['role'] == 'role_user') {
                    header('Location: index.php');
                    die();
                } else {
                    echo '404';
                }

            } else {
                $errors['email'] = 'Erreur d\'email ou de mot de passe';
            }
        } else {
            $errors['email'] = 'Erreur d\'email ou de mot de passe';
        }
    } else {
        $errors['email'] = 'Veuillez renseigner les champs';
    }
}

?>

<!-- Connecté -->
<?php if(!empty($_SESSION)) : ?>

  <?php header('Location: index.php'); ?>

<?php endif; ?>

<!-- Mode CONNEXION  -->
<?php if(empty($_SESSION)) : ?>
  <section id="login">
    <div class="wrap-section-connexion-1">
      <div class="form-login">
        <h2>connexion</h2>
        <form action="login.php" method="post">
          <div class="w50">
            <input type="email" name="email" required="" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
            <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>
            <label>Email</label>
          </div>
          <div class="w50">
            <input type="password" name="password" required="">
            <span class="error"><?php if(!empty($errors['password'])) { echo $errors['password']; }?></span>
            <label>Mot de passe</label>
          </div>
          <a href="">Mot de passe oublié ?</a>
          <div class="w50">
            <input type="submit" name="submitted" value="Login">
          </div>
        </form>
      </div>
    </div>
  </section>
<?php endif; ?>

<!-- Mode MDP oublier  -->
<?php
include('inc/footer-front.php');

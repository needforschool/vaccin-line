<?php
session_start();
include('inc/pdo.php');
include('inc/function.php');
$title = 'Connexion';

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



<form action="login.php" method="post">

<input type="email" name="email" placeholder="Email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
<input type="password" name="password" placeholder="Mot de passe">
<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; }?></span>

<input type="submit" name="submitted" value="Connexion">

</form>

<?php include('inc/footer-front.php');

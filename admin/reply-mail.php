<?php
session_start();
include('../inc/pdo.php');
include('../inc/function.php');
if (!est_connecte()) {
  header('Location: 403.php');
  } elseif ($_SESSION['user']['role'] != 'role_admin') {
  header('Location: 403.php');
  }
$title = 'Envoyer un mail';
$errors = array();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$expediteur = mb_strtoupper($_SESSION['user']['nom']) . ' ' . ucfirst($_SESSION['user']['prenom']);

if (!empty($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_contacts WHERE status = 1 AND id = :id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $email = $query->fetch();
}

if (!empty($_POST['submitted'])) {
  // Verification XSS
  $couriel = cleanXss($_POST['couriel']);
  $object = cleanXss($_POST['object']);
  $content = cleanXss($_POST['content']);

  $errors = validationText($errors, $object, 'object', 2, 50,);

  if (!empty($couriel)) {
    if (!filter_var($couriel, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Veuillez renseigner un email valide';
    }
  }else {
    $errors['email'] = 'Veuillez renseigner un email';
  }

  if (!empty($content)) {
    if (mb_strlen($content) < 2) {
      $errors['content'] = 'Veuillez renseigner au minimum 2 caractères';
    }
  }else {
  $errors['content'] = 'Veuillez renseigner ce champ.';
  }

  if (count($errors) == 0) {
    $couriel = new PHPMailer(true);
    $message = $content;
    try {
        //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($_SESSION['user']['email'],$expediteur);
        $mail->addAddress($couriel);     // Add a recipient

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $object;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        header('location: list-mail.php?error=no');
    } catch (Exception $e) {
        header('location: reply-mail.php?error=yes&id='. $id .'');
    }
      }
}

$sql = "SELECT * FROM vl_contacts WHERE status = 1 AND lu = 'non'";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchAll();

include('inc/header-back.php');
 ?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

      <?php if(!empty($_GET['error']) && $_GET['error'] == 'yes'){ ?>
        <div class="alert alert-danger" role="alert">
          Erreur lors de l'envoi du mail
        </div>
      <?php }elseif (!empty($_GET['error']) && $_GET['error'] == 'no') {?>
        <div class="alert alert-success" role="alert">
          Le mail a été envoyé
        </div>
    <?php  } ?>

        <a href="<?php if(!empty($_GET['id'])){echo 'single-mail.php?id=?id='. $_GET['id'];}else{ echo 'list-mail.php';} ?>" class="btn btn-outline-primary">Retour</a>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-center text-gray-800"><?php echo mb_strtoupper($title); ?></h1>

        <form class="" action="reply-mail.php<?php if(!empty($_GET['id'])){echo '?id='. $_GET['id'];} ?>" method="post">

          <div class="row">
            <div class="col">
              <input type="email" name="couriel" id="couriel" class="form-control <?php if(count($errors['couriel']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($email)){echo 'value="'. $email['couriel'] .'"';} else {echo 'placeholder="Email"';} ?>>
              <div class="invalid-feedback">
                Veuillez remplir correctement ce champ.
              </div>
            </div>
            <div class="col">
              <input type="text" name="object" id="object" class="form-control <?php if(count($errors['object']) != 0) { echo 'is-invalid';} ?>" <?php if(!empty($email)){echo 'value="RE : '. $email['object'] .'"';} else {echo 'placeholder="Objet"';} ?>>
              <div class="invalid-feedback">
                Veuillez remplir correctement ce champ.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <textarea name="content" style="resize: none; height: 200px;" class="form-control <?php if(count($errors['content']) != 0) { echo 'is-invalid';} ?> mt-3" id="content" placeholder="Votre message" required></textarea>
            <div class="invalid-feedback">
              Veuillez remplir correctement ce champ.
            </div>
          </div>

          <input type="submit" name="submitted" value="Envoyer" class="btn btn-primary">

        </form>

    </div>
    <!-- /.container-fluid -->



<?php
include('inc/footer-back.php');

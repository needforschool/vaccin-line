<?php 
const MERCURY_PATH = 'C:\Apache\xampp\MercuryMail';
$userFile = MERCURY_PATH . DIRECTORY_SEPARATOR . "PMAIL.USR";
$mailDir = MERCURY_PATH . DIRECTORY_SEPARATOR . "MAIL";

$newName = "Baba Konko";
$newUsername = "baba";
$newPassword = "pass";
$host = "localhost";

if (! is_writeable ( $userFile )) {
    die ( "You don't have permission to  Create new User" );
}

if (! is_writeable ( $mailDir )) {
    die ( "You don't have permission to add mail folder" );
}

// Check if user exist

if (is_file ( $userFile )) {
    $users = file ( $userFile );

    foreach ( $users as $user ) {
        list ( $status, $username, $name ) = explode ( ";", strtolower ( $user ) );

        if (strtolower ( $newUsername ) == $username) {
            die ( "User Already Exist" );
        }
    }
}

$userData = "U;$newUsername;$newName";
$fp = fopen ( $userFile, "a" );

if ($fp) {
    fwrite ( $fp, $userData . chr ( 10 ) );
    fclose ( $fp );
}

$folder = $mailDir . DIRECTORY_SEPARATOR . $newUsername;
if (! mkdir ( $folder )) {
    die ( "Error Creating Folder" );
}

$pm = '# Mercury/32 User Information File' . chr ( 10 );
$pm .= 'POP3_access: ' . $newPassword . chr ( 10 );
$pm .= 'APOP_secret: ' . $newPassword . chr ( 10 );

$pmFile = $folder . DIRECTORY_SEPARATOR . 'PASSWD.PM';
file_put_contents ( $pmFile, $pm );
?>
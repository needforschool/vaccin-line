<?php

function debug($tableau){
  echo '<pre>';
  print_r($tableau);
  echo '</pre>';
}

function cleanXss($toClean){
    return trim(strip_tags($toClean));
}

function validationText($errors,$data,$key,$min,$max)
{

    if(!empty($data)) {
      if(mb_strlen($data) < 2) {
        $errors[$key] = 'Min'. $min . ' ' . 'caractères';
      } elseif(mb_strlen($data) > 140) {
        $errors[$key] = 'Max'. $max . ' ' . 'caractères';
      } else {
        // no error sur ce champ
      }
    } else {
      $errors['"'. $key .'"'] = 'Veuillez renseigner ce champ';
    }
    return $errors;
}

function est_connecte(): bool
{
  $isLogged = true;
  if (empty($_SESSION['user'])) {
    $isLogged = false;
    return $isLogged;
  } else {
    foreach ($_SESSION['user'] as $key => $value) {
      if (!isset($key) && !isset($value)) {
        $isLogged = false;
        return $isLogged;
      }
    }
  }
  return $isLogged;
}

function timeToMY($englishTime)
{
  return date('m/Y', strtotime($englishTime));
}

function TotalNonLu($contacts)
{
  $a = 0;
  foreach ($contacts as $contact) {
    if ($contact['lu'] == 'non') {
      ++$a;
    }
  }
  return $a;
}

function numberMail($a)
{
  if ($a < 4) {
    return $a;
  }else {
    return 4;
  }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function isActual($token_at) {
  $token_at = strtotime($token_at);
  $actualTime = strtotime(date('Y-m-d H:i:s'));
  $interval = $actualTime - $token_at;
  if ($interval > 600) {
    return false;
  } else {
    return true;
  }
}

function isAdmin()
{
  if (!est_connecte()) {
    header('Location: ../admin/403.php');
    } elseif ($_SESSION['user']['role'] != 'role_admin') {
    header('Location: ../admin/403.php');
    }
}

function timeRenouvellement($userDate, $vaccinExp)
{
  $userDate = strtotime($userDate);
  $prochainRappel = $userDate + $vaccinExp;
  $actualTime = strtotime(date('Y-m-d H:i:s'));
  (int)$interval = $prochainRappel - $actualTime;
  $result = array(
    'prochainRappel' => date('j-m-Y', $prochainRappel),
    'color' => '' ,
  );
  if ($interval > 15778800) {
    $result['color'] = 'style="color: #0be881;"';
  } elseif ($interval <= 15778800 && $interval > 2629800) {
      $result['color'] = 'style="color: #ffa801;"';
    } elseif ($interval <= 2629800) {
        $result['color'] = 'style="colo: #ff3f34;"';
      }
  return $result;
}

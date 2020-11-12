<?php

function debug($tableau){
  echo '<pre>';
  print_r($tableau);
  echo '</pre>';
}

function cleanXss($toClean){
    return trim(strip_tags($toClean));
}

function validationText($errors,$data,$key,$min,$max) {

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



?>

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
  
  function isLogged(){
    if(!empty($_SESSION['user'])) {
      if(!empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id'])) {
        if(!empty($_SESSION['user']['pseudo'])) {
          if(!empty($_SESSION['user']['role'])) {
            if($_SESSION['user']['role'] == 'abonne' || $_SESSION['user']['role'] == 'admin') {
              if(!empty($_SESSION['user']['ip']) && $_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                return true;
              }
            }
          }
        }
      }
    }
    return false;
}



?>
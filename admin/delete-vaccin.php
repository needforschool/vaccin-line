<?php
include('../inc/pdo.php');
include('../inc/function.php');

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM vl_vaccins WHERE id = $id";
  $query = $pdo->prepare($sql);
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $exist = $query->fetch();
  if (!empty($exist)) {
    $sql = "DELETE FROM vl_vaccins WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    header("location: manage-vaccin.php?error=no");
    exit;
  }else {
    header("location: manage-vaccin.php?error=yes");
    exit;
  }
}

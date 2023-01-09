<?php
require_once 'config.php';
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $check = $dbco->prepare('SELECT nom_entreprise, email_entreprise, mot_de_passe, admin FROM liste_entreprise WHERE email_entreprise = ?');
  $check->execute(array($email));
  $data = $check->fetch();
  $row = $check->rowCount();

  if ($row == 1) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $password = hash('sha256', $password);
      if ($data['mot_de_passe'] === $password) {
        if ($data['admin'] == 1) {
          $_SESSION['user'] = $data['nom_entreprise'];
          header('Location:dashboard_edit.php');
        }
        if ($data['admin'] == 0) {
          $_SESSION['user'] = $data['nom_entreprise'];
          header('Location:dashboard.php');
        }else {header(`Location:index.php?login_err=statu/{$_SESSION['user']}`);}
      }else {{header('Location:index.php?login_err=password');}}
    }else {header('Location:index.php?login_err=email');}
  }else {header('Location:index.php?login_err=already');}
}else {header('Location:index.php?login_err=post');}
 ?>

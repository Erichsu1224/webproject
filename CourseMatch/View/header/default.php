<?php
  //session_start();
  $_SESSION['check_login']=false;
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title><?php if(isset($title)){ echo $title; }?></title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body topmargin="0" leftmargin="0" style="background-color:#F2FFF2;">
  <?php
    require 'View/body/home.php';
  ?>

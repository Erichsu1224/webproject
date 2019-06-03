<?php //session_start(); ?>
<!DOCTYPE HTML>

<html>
<head>
  <meta charset="utf-8">
  <title>CourseMatch</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body topmargin="0" leftmargin="0" style="background-color:#F2FFF2;">
  <div class= "header" style="width:100%; height:80px; background-color:#008844;">
    <div class= "title" style="font-size:50px; height:200px;float:left;margin-top:10px">
        <a href= "index.php" style=" text-decoration:none; color:white; "><b style="margin-left: 20px;">CourseMatch</b></a>
    </div>



  <?php
    if($_SESSION['check_login']==false){
      echo "<h1>Please Login first</h1>";
      header("refresh:2;url=index.php");
      exit();
    }

    $con = mysqli_connect("140.136.150.68:33066","coursematch","","User");

    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }

    mysqli_select_db($con, "User");
    mysqli_query($con,"SET CHARACTER SET UTF8");

    $users_username = $_SESSION['username'];

    $sql="SELECT `username`, `password`, `studentid`, `email`, `name` FROM `user` WHERE `username`='$users_username'";
    $result=mysqli_query($con, $sql);
    $users_name=NULL;

    while($row=mysqli_fetch_array($result)){
        $users_name=$row['name'];
    }
    ?>
    <div class= "button_signin" style="float:right; margin-right:60px; margin-top:25px; color:white;">
      <p style='font-size:20px;'>
      <?php
        echo "Welcome&nbsp".$users_name;
       ?>
     </p>
    </div>
  </div>

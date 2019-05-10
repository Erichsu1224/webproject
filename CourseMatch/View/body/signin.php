<div class="container" style="margin-left:2px; margin-top:2px;">

  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

    <h2>Sign in</h2>
    <hr>

    <?php
    //check for any errors
    if(isset($error)){
      foreach($error as $error){
        echo '<p class="bg-danger">'.$error.'</p>';
      }
    }

    //if action is joined show sucess
    if(isset($_GET['action']) && $_GET['action'] == 'joined'){
      echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
    }
    ?>

    <form method="post" action="">
      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="1">
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="2">
      </div>

      <div class="row">
        <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="3" style="background-color: green;"></div>
      </div>
    </form>

    <?php
      if($_POST){

        $con = mysqli_connect("140.136.150.68:33066","root","880323","User");

        if (!$con)
        {
          die('Could not connect: ' . mysql_error());
        }

        $users_username = $_POST['username'];
        $users_password = $_POST['password'];

        $sql="SELECT `username`, `password` FROM `user` WHERE `username`='$users_username'";
        $result=mysqli_query($con, $sql);
        $db_username=NULL;
        $db_password=NULL;
        while($row=mysqli_fetch_array($result)){
            $db_username=$row['username'];
            $db_password=$row['password'];
        }
        if($users_username===$db_username && $users_password===$db_password){

          $_SESSION['check_login']=true;
          $_SESSION['username']=$users_username;
          header("refresh:0;url=personal");
        }
        else {
          $_SESSION['check_login']=false;

          echo "<h3>Account Not Found&nbsp;&nbsp;&nbsp;Please Relogin...</h3> ";
          header("refresh:2;url=signin");
        }

        mysqli_close($con);
      }
     ?>

  </div>
</div>

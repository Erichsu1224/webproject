<?php
    $con = mysqli_connect("140.136.150.68:33066","root","880323","User");
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }
    mysqli_query($con,"SET CHARACTER SET UTF8");
 ?>
<div class=personalfile style="width:275px; height:100%;border-right:3px solid black; margin-bottom:20px; margin-left:-300px; float:left;">
  <div name=photo style="margin-top:20px;">
    <img src='logo-person-png.png' style="size:20px;">
  </div>
  <div name=info>
    <table border=1>
      <?php
        $username = $_SESSION['username'];
        $sql="SELECT `username`,`password`,`email` from `user` Where `username` = '$username'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_row($result);

        $output = "<tr><td>username</td><td>".$row[0]."</td></tr><tr><td>password</td><td>"."*********"."</td></tr><tr><td>email</td><td>".$row[2]."</td></tr>";

        echo $output;

       ?>
    </table>
  </div>
</div>

<div style="float:left; border-right:3px solid black; margin-bottom:20px;">
  <div style="margin-left:20px; margin-top:20px; margin-right:6a0px">
    <table border=1 width=600 align="center" width=600px>
      <tr>
        <td></td><td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td><td>星期六</td>
      </tr>
      <tr>
        <td>8:10 ~ 9:00</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>9:10 ~ 10:00</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>10:10 ~ 11:00</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>11:10 ~ 12:00</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>午休</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>1:40 ~ 2:30</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>2:40 ~ 3:30</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>3:40 ~ 4:30</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>4:40 ~ 5:30</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>5:40 ~ 6:30</td><td></td><td></td><td></td><td></td><td></td><td></td>
      </tr>
    </table>
  </div>

  <div style="margin-top:20px; ">
    <a href="editcourse">修改課表</a>
  </div>

  <!--
  <div>
    <form action="" method="post">
    　&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp輸入你有的課程：<input type="text" name="course" id='course'>
    　<input type="submit" value="送出">
    </form>

    <?php
    /*
      if($_POST)
      {
        $course = $_POST['course'];
        $sql="SELECT `course_name` FROM `course` WHERE `course_name` = '$course'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 0)
        {
          echo mysqli_num_rows($result);
          $sql = "INSERT into `course`(`course_name`) VALUES('$course')";
          mysqli_query($con, $sql);
          $sql = "CREATE TABLE $course(name varchar(25) not NULL)";
          mysqli_query($con, $sql);
        }

        mysqli_select_db($con, $course);
        mysqli_query($con,"SET CHARACTER SET UTF8");
        $sql="INSERT INTO $course(`name`) VALUES ('$users_name')";
        mysqli_query($con,$sql);
      }
      */
     ?>
  </div>

  <div>
    <form action="" method="post">
    　<input type=submit>查查誰跟你修同一堂課吧</input>
    </form>

    <?php
    /*
    if($_POST){
        header("refresh:1; url:block");
    } ?>

    <?php
      if($_POST){
        if (!$con)
        {
          die('Could not connect: ' . mysql_error());
        }
        $course = $_POST['course'];
        mysqli_select_db($con, $course);
        mysqli_query($con,"SET CHARACTER SET UTF8");

        $sql="SELECT * FROM `$course`";
        $result=mysqli_query($con, $sql);

        while($row=mysqli_fetch_array($result)){
            echo $row[0]."<br>";
        }
      }
      */
     ?>
  </div>
  -->
</div>

<div style="width:250px; height:100%;float:left;">
  <p>test</p>
</div>

<?php
    $con = mysqli_connect("140.136.150.68:33066","coursematch","","User");
    if (!$con)
    {
      die('Could not connect: ' . mysql_error());
    }
    mysqli_query($con,"SET CHARACTER SET UTF8");

    $conn = mysqli_connect("140.136.150.68:33066","coursematch","","Course");
    if (!$conn)
    {
      die('Could not connect: ' . mysql_error());
    }
    mysqli_query($conn,"SET CHARACTER SET UTF8");
 ?>
<div class=personalfile style="width:270px; height:100%; margin-bottom:20px; margin-left:-300px; margin-right:20px; float:left;">
  <div name=photo style="margin-top:20px;">
    <img src='logo-person-png.png' style="size:20px;">
  </div>
  <div name=info>
    <table border=1>
      <?php
        $username = $_SESSION['username'];
        $sql="SELECT `username`,`password`,`studentid`,`email`,`name` from `user` Where `username` = '$username'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_row($result);
        $name = $row[4];

        $output = "<tr><td>username</td><td>".$row[0]."</td></tr><tr><td>password</td><td>"."*********"."</td></tr><tr><td>studentid</td><td>".$row[2]."</td></tr><tr><td>email</td><td>".$row[3]."</td></tr>";

        echo $output;

       ?>
    </table>
  </div>
</div>

<div style=" width:800px; float:left; margin-bottom:20px;">
  <div style="margin-left:20px; margin-top:20px; margin-right:60px">
    <table border=1 width=600 align="center" width=600px>
      <tr>
        <td></td><td>星期一</td><td>星期二</td><td>星期三</td><td>星期四</td><td>星期五</td><td>星期六</td>
      </tr>
      <?php
        $out = "";

        for($i = 1; $i <= 10; $i++)
        {
          $out .= "<tr><td width=150px>";

          switch($i)
          {
            case 1:
              $out .= "8:10 ~ 9:00";
              $s_t = '8:10';
              break;
            case 2:
              $out .= "9:10 ~ 10:00";
              $s_t = '9:10';
              break;
            case 3:
              $out .= "10:10 ~ 11:00";
              $s_t = '10:10';
              break;

            case 4:
              $out .= "11:10 ~ 12:00";
              $s_t = '11:10';
              break;

            case 5:
              $out .= "12:10 ~ 13:10";
              $s_t = '12:10';
              break;

            case 6:
              $out .= "13:40 ~ 14:30";
              $s_t = '13:40';
              break;

            case 7:
              $out .= "14:40 ~ 15:30";
              $s_t = '14:40';
              break;

            case 8:
              $out .= "15:40 ~ 16:30";
              $s_t = '15:40';
              break;

            case 9:
              $out .= "16:40 ~ 17:30";
              $s_t = '16:40';
              break;

            case 10:
              $out .= "17:40 ~ 18:30";
              $s_t = '17:40';
              break;
          }
          $out .= "</td>";

          for($j = 1; $j <= 6; $j++)
          {

             $sql = "SELECT `course`,`start_time` from `$name` where `date` = $j && (`start_time` <= '$s_t' && `end_time` >= '$s_t')";
             $out .= "<td width=100px>";
             $result = mysqli_query($con, $sql);
             if($result)
             {

               $row=mysqli_fetch_row($result);
               if($row[0] != '')
                $out .= "<form method=post><input type=hidden name=course_name value=".$row[0]."><input type=submit value=".$row[0]."></form>";
             }

             $out .= "</td>";

          }
          $out .= "</tr>";
        }
        echo $out;
       ?>

    </table>
  </div>

  <div style="margin-top:20px; margin-left: 80px;">
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

<div style="width:250px; height:100%;float:left; margin-left:20px;">
  <?php
    if($_POST)
    {
      $course_name = $_POST['course_name'];
      echo "<h4>".$course_name."跟你同一堂的</h4>";

      $sql = "SELECT `user_name` from `$course_name`";

      $result = mysqli_query($conn, $sql);

      if($result)
      {
        while($row = mysqli_fetch_row($result))
        {
          if($result === $name)
          {
            continue;
          }
          echo $row[0]."<BR>";
        }
      }

    }
   ?>
</div>

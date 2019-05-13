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
        $sql="SELECT `username`,`password`,`email`, `name` from `user` Where `username` = '$username'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_row($result);
        $name = $row[3];

        $output = "<tr><td>username</td><td>".$row[0]."</td></tr><tr><td>password</td><td>"."*********"."</td></tr><tr><td>email</td><td>".$row[2]."</td></tr>";

        echo $output;

       ?>
    </table>
  </div>
</div>

<div style="float:left; margin-top:20px;">
  <div>
    <?php
      $sql= "SELECT * from $name order BY `date`,`start_time`";
      $result = mysqli_query($con, $sql);

      for($i = 0; $i < mysqli_num_rows($result); $i++)
      {
        $row = mysqli_fetch_row($result);
        echo "<form method=post><input type=hidden name=chk value=delete><input type=hidden name=cs value=".$row[0]."><input type=submit value=刪除>";
        echo "<b>";
        switch($row[1])
        {
          case 1:
            echo "星期一 ";
            break;
          case 2:
            echo "星期二 ";
            break;

          case 3:
            echo "星期三 ";
            break;

          case 4:
            echo "星期四 ";
            break;

          case 5:
            echo "星期五 ";
            break;

          case 6:
            echo "星期六 ";
            break;
        }

        echo $row[2]."~".$row[3].":</b> ".$row[0];
        echo "</form>";
      }
     ?>
  </div>

  <div style="margin-top:20px">
    <form action="" method=post>
      <input type=text name="course" placeholder="課程名稱">
      <input type=text name="date" placeholder="星期幾(請輸入1~6)">
      <input type=text name="start_time" placeholder="開始時間(xx:xx)">
      <input type=text name="end_time" placeholder="結束時間(xx:xx)">
      <input type=hidden name=chk value="insert">
      <input type=submit value="新增">
    </form>

    <?php
      if($_POST)
      {
        if($_POST['chk'] == "insert")
        {
          $course = $_POST['course'];
          $date = $_POST['date'];
          $start_time = $_POST['start_time'];
          $end_time = $_POST['end_time'];

          $sql = "INSERT INTO `$name`(`course`, `date`, `start_time`, `end_time`) VALUES('$course', $date, '$start_time', '$end_time')";
          mysqli_query($con, $sql);
        }
        if($_POST['chk'] == "delete")
        {
          $course = $_POST['cs'];
          $sql = "DELETE From `$name` WHERE `course` = '$course'";
          mysqli_query($con, $sql);
        }

        header("refresh:0;url=editcourse");
      }
    ?>
  </div>

  <div style="margin-top:150px;">
    <a href="personal">返回課表</a>
  </div>
</div>

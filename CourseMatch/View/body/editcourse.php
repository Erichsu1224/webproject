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

<div>
  <?php
    $sql= "SELECT * from $name order BY `date`,`start_time`";
    $result = mysqli_query($con, $sql);

    for($i = 0; $i < mysqli_num_rows($result); $i++)
    {
      $row = mysqli_fetch_row($result);
      echo "<form method=post><input type=submit value=刪除>";
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

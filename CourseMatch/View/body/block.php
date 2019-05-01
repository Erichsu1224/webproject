<?php //session_start() ?>
<div>
  <div style="margin-top:20px;">
    <form method="post" action="">
      <select name="coursename">
        <?php
          $con = mysqli_connect("140.136.150.68:33066","root","880323","eric");
          if (!$con){
            die('Could not connect: ' . mysql_error());
          }
          mysqli_query($con,"SET CHARACTER SET UTF8");
          $sql = "SELECT `course_name` FROM `course`";
          $result = mysqli_query($con, $sql);

          $output = "";

          while($row = mysqli_fetch_array($result))
          {
            echo $row['course_name']."\n";
            $output .= "<option value=".$row['course_name'].">".$row['course_name']."</option>";
          }

          echo $output;
        ?>
      </select>
      <input type=submit></input>
    </form>
  </div>

  <div style="margin-top:20px;">
    <?php
      if($_POST){
        $c_n = $_POST['coursename'];
        $sql="SELECT `name` FROM `$c_n`";
        $result = mysqli_query($con, $sql);
        if($result){
          $output="<table border=2 width=200>";
          while($row = mysqli_fetch_array($result))
          {
            $output .= "<tr><td align=center>".$row['course_name']."</td></tr>";
          }
          $output .= "</table>";
          echo $output;
        }
      }
     ?>
  </div>
</div>

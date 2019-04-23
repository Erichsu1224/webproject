<?php //session_start() ?>
<div>
  <div style="margin-top:20px;">
    <form method="post" action="">
      <select name="coursename">
        <?php
          $conn = mysqli_connect("localhost","root","","coursematch");
          if (!$conn){
            die('Could not connect: ' . mysql_error());
          }
          mysqli_query($conn,"SET CHARACTER SET UTF8");
          $sql = "SELECT `name` FROM `coursename`";
          $result = mysqli_query($conn, $sql);

          $output = "";

          while($row = mysqli_fetch_array($result))
          {
            $output .= "<option value=".$row['name'].">".$row['name']."</option>";
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
        $result = mysqli_query($conn, $sql);
        if($result){
          $output="<table border=2 width=200>";
          while($row = mysqli_fetch_array($result))
          {
            $output .= "<tr><td align=center>".$row['name']."</td></tr>";
          }
          $output .= "</table>";
          echo $output;
        }
      }
     ?>
  </div>
</div>

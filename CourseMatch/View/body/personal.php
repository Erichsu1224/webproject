
<div style="margin-top:20px; margin-bottom:10px;">
  <form action="" method="post">
  　&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp輸入你有的課程：<input type="text" name="course" id='course'>
  　<input type="submit" value="送出">
  </form>

  <?php
    if($_POST){
      if (!$con)
      {
        die('Could not connect: ' . mysql_error());
      }
      $course = $_POST['course'];
      mysqli_select_db($con, $course);
      mysqli_query($con,"SET CHARACTER SET UTF8");
      $sql="INSERT INTO $course(`name`) VALUES ('$users_name')";
      mysqli_query($con,$sql);
    }
   ?>
</div>

<div>
  <form action='block' method="">
  　<input type=submit>查查誰跟你修同一堂課吧</input>
  </form>

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
   ?>

</div>

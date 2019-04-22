<?php //session_start() ?>
<div>
  <?php
    $conn = mysqli_connect("localhost","root","","coursematch");
    $result = Mysqli_fetch_array("user", $conn);

    for($i = 0; $i < mysqli_num_rows($result); $i++)
    {
      echo ($result[$i]."\n");
    }
  ?>
</div>

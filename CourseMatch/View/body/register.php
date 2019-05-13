<div class="container" style="margin-left:2px; margin-top:2px;">
	<div class="row">
	    <div style="margin-top:-100px;"class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Please Sign Up</h2>

				<hr>


				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name"  tabindex="1">
					<script>

					</script>
				</div>
				<!--
				<div class="form-group">
					<form>
						<input type="button" value="Check if your acount has been asign">
					</form>
				</div>
			-->
				<div class="form-group">
					<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Chinese Name" tabindex="2">
				</div>
				<div class="form-group">
					<input type="text" name="studentid" id="studentid" class="form-control input-lg" placeholder="Student id" tabindex="3">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7" style="background-color: green;"></div>
				</div>
			</form>

			 <?
					if($_POST)
					{
					  $con = mysqli_connect("140.136.150.68:33066","root","880323","User");

					  if (!$con)
					  {
					    die('Could not connect: ' . mysql_error());
					  }

						mysqli_query($con,"SET CHARACTER SET UTF8");

						$users_username = $_POST['username'];
						$users_password = $_POST['password'];
						$users_studentid = $_POST['studentid'];
						$users_email = $_POST['email'];
						$users_name = $_POST['name'];


						$users_username = mysqli_real_escape_string($con, $users_username);
						$users_password = mysqli_real_escape_string($con, $users_password);
						$users_studentid = mysqli_real_escape_string($con, $users_studentid,);
						$users_email = mysqli_real_escape_string($con, $users_email);
						$users_name = mysqli_real_escape_string($con, $users_name);


						$sql="CREATE Table $users_name(course varchar(50) Not NULL, date int(11) Not NULL, start_time time Not NULL, end_time time Not NULL)";
						mysqli_query($con, $sql);

						//test is the account has been asign
						/*
						$sql="SELECT `username` FROM `User` WHERE `username`='$users_username'";
						$result=mysqli_query($con,$sql);
						if(mysqli_num_rows($result) != 0)
						{
							echo "<p style='font-size:25px;'>Your username has been asign. Please Resignup.</p>";
							header("refresh:2;url=register");
							exit;
						}
						//end test
						*/

					  $query = "INSERT INTO `user`(username,password,studentid,email,name) VALUES ('$users_username','$users_password','$users_studentid','$users_email','$users_name')";
					  mysqli_query($con,$query);
					  mysqli_close($con);

						header("refresh;url=signin");
					}

					?>

		</div>
	</div>

</div>

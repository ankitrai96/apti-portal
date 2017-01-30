<?php
	include("class/users.php");
	$profile=new users;
	$profile->activetests();
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIET Aptitude Portal</title>
	<script type="text/javascript" src="apti_assets/custom_event_handler.js"></script>
	<link rel="stylesheet" type="text/css" href="apti_assets/style.css">
</head>
<body style="background-image: url('apti_assets/pay-937884_1280.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
<br><br>
	<?php 
		if(isset($_GET['up'])&& $_GET['up']=="success")
			{
				echo "<center><font color='green'>Registration Successful. You can log in now.</font></center>";
			}
		if(isset($_GET['up'])&& $_GET['up']=="exists")
			{
				echo "<center><font color='blue'>Already Registered! Forgot Password?</font></center>";
			} 
		if(isset($_GET['cross'])  && $_GET['cross']=="failed")
			{
				echo "<center><font color='red'>Authentication Error! Try Again.</font></center>";
			}
	?>
<div id="login_box">
	<form action="home.php" method="POST">
		<input type="text" name="uid" placeholder="enrollment number" required="true"><br>
		<input type="password" name="pwd" placeholder="Password" required="true"><br>
		<select name="tad" required>
		  <option value="">Select Test</option>
		  <?php		  
		  foreach($profile->activetestIds as $tad)
		  {  ?>			  			
			<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'];?></option>
			<?php   }?>
		  </select>
		<br><br>
		<button type="submit" class="button">Log in</button>
	</form>
	<br>
	<button style="float: left;" onclick="damn.duck1()">Register</button>
	<button style="float: right;" onclick="damn.duck0()">Admin Login</button>
	<br><br>
</div>
<div id="signup_box">
	<form action="auth/signup.php" method="POST">
		<input type="text" name="first" placeholder="First Name" required="true" ><br>
		<input type="text" name="last" placeholder="Last Name"><br>
		<input type="text" name="uid" placeholder="enrollment number" required="true"><br>
		<input type="password" name="pwd" placeholder="Password" required="true"><br><br>
		<button type="submit" class="button">Register</button>
	</form>
	<br>
	<button style="float: right;" onclick="damn.duck2()">Already Registered?</button><br><br>
</div>
<div id="admin_box">
	<form action="auth/cPanel.php" method="POST">
		<input type="text" name="uid" placeholder="admin username" required="true"><br>
		<input type="password" name="pwd" placeholder="Admin Password" required="true"><br><br>
		<button type="submit" class="button">Log in</button>
	</form>
	<br>
	<button style="float: right;" onclick="damn.dumb0()">Student Login</button><br><br>
</div><br><br><br>
	<center>
	<form method="GET" action="auth/leaderboard.php" target="_blank">
			<select name="testid" required>
				<option value="">ScoreBoard</option>
				<?php		  
		  			foreach($profile->activetestIds as $tad)
		  			{  ?>			  			
					<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'].' : '.$tad['tdate'];?></option>
				<?php   }?>
			</select>
			<button style="border: 2px solid red; padding: 5px; border-radius: 8px; margin: auto; color: white; background-color: #333; font-weight: bold;" onclick="location.href='../logout.php'">Fetch</button>
		</form><br><br></center>

	<center><p style="font-size: 12px;bottom: 8px; position: absolute; right: 40%;">Ankit Rai | Jagdish Chauhan<br>Under Guidance of Mr. Bhupendra Kumar<br>Department of Information Technology, NIET</p></center>
</body>
</html>
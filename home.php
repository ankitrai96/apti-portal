<?php
	include("class/users.php");
	$profile=new users;
	if(!isset($_SESSION['uid'])){
		extract($_POST);
		if(!$profile->signin($uid,$pwd,$tad)){
			$profile->url("index.php?cross=failed");
		}
	}
	$profile->qus_show($_SESSION['test_cat']);
	$profile->users_profile($_SESSION['uid']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aptitude Test</title>
	<script type="text/javascript" src="apti_assets/timeout.js"></script>
	<link rel="stylesheet" type="text/css" href="apti_assets/style.css">
	<script type="text/javascript">
		function sawal(){
        document.getElementById('bamn').style.display = "none";
        document.getElementById('quesbox').style.display = "block";
        document.getElementById('logout').style.display = "none";
        timeout();
    	}
	</script>
</head>
<body>
	<script type="text/javascript">
		timeLeft = 90 ;
	</script>
		<ul>
  			<li style="float: left; margin-left: 5px;"><?php echo $_SESSION['student_name'];?></li>
			<li style="float: right; margin-right: 5px;" id="time"></li>
		</ul>
	<br>
	<div class="container">
	<center><h2>Aptitude Test</h2><br>
	<button class="button" id="bamn" onclick="sawal()">Start</button><br><br>

	<h5 style="font-color: red;">NOTE: You can attempt the same test more than once. However, only initial score will be considered for leaderboard.</font></h5><br><br>
          <br><br>
	<button style="border:2px solid red;padding:5px;border-radius:8px;top: 50px;color:white;background-color: #333;font-weight:bold;" onclick="location.href='logout.php'" id="logout">Log Out</button><br></center>

	<div id="quesbox">
		<?php
		$i=1;
		foreach($profile->qus as $qust) {?> 
		<form method="post" id="questions" action="answers.php">
		  <table>
			<thead>
			  <tr>
				<th style="text-align: left;">Q.<?php echo $i;?>) <?php echo $qust['question'];?></th>
			  </tr>
			</thead>
			
			<tbody>
			  <tr>
				<td>&nbsp;1&emsp;<input type="radio" value="1" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans1'];?> </td>
			  </tr>
			  <tr>
				<td>&nbsp;2&emsp;<input type="radio" value="2" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans2'];?></td>
			  </tr>
			  <tr>
				<td>&nbsp;3&emsp;<input type="radio" value="3" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans3'];?></td>
			  </tr>
			  	<tr>
				<td>&nbsp;4&emsp;<input type="radio" value="4" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans4'];?></td>
			  </tr>
			<tr>
				<td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $qust['id']; ?>" /></td>
			  </tr>
			  <hr>
			</tbody>
		  </table>
		<?php $i++;}?><br><br>
		<center><input type="submit" value="Done" class="button"/></center>
	</form>	
	</div>
	<br><br>	
	</div>
</body>
</html>


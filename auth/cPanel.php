<?php
	include("../class/users.php");
	$admin =new users;
	if(!isset($_SESSION['a_id'])){
		extract($_POST);
		if(!$admin->admin_in($uid,$pwd)){
			$admin->url("../index.php?cross=failed");
		}
	}
	$admin->alltests();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<script type="text/javascript">
		function swap1(){
			document.getElementById('add_q').style.display = "none";
        	document.getElementById('test_stat').style.display = "none";
        	document.getElementById('results').style.display = "block";
		}
		function swap2(){
			document.getElementById('add_q').style.display = "block";
        	document.getElementById('test_stat').style.display = "none";
        	document.getElementById('results').style.display = "none";
		}
		function swap3(){
			document.getElementById('add_q').style.display = "none";
        	document.getElementById('test_stat').style.display = "block";
        	document.getElementById('results').style.display = "none";
		}
		function swap4(){
			document.getElementById('append_table').style.display = "none";
        	document.getElementById('toggle').style.display = "block";
        	document.getElementById('dele').style.display = "none";
		}
		function swap5(){
        	document.getElementById('dele').style.display = "none";
        	document.getElementById('append_table').style.display = "block";
        	document.getElementById('toggle').style.display = "none";
		}
		function swap6(){
        	document.getElementById('append_table').style.display = "none";
        	document.getElementById('toggle').style.display = "none";
        	document.getElementById('dele').style.display = "block";
		}
	</script>
	<link rel="stylesheet" type="text/css" href="../apti_assets/style.css">
</head>
<body>
	<br><br>
	<ul>
		<center>
		<li><a onclick="swap1()"> Results </a></li>
		<li><a onclick="swap2()">Questions</a></li>
		<li><a onclick="swap3()">Tests</a></li>
		</center>
	</ul>
	<div class="sub">

		<?php 
		if(isset($_GET['task'])&& $_GET['task']=="success")
			{
				echo "<center><font color='green'>Task Successfully Executed!</font></center>";
			}
		if(isset($_GET['task'])&& $_GET['task']=="failed")
			{
				echo "<center><font color='red'>Task Execution Failed! Try Again.</font></center>";
			}
		?>

	<div id="add_q">
	<center>
	<form action="add_ques.php" method="POST">
		Q:<input type="text" name="q" placeholder="question" required><br>
		A:<input type="text" name="op1" placeholder="option-A" required><br>
		B:<input type="text" name="op2" placeholder="option-B" required><br>
		C:<input type="text" name="op3" placeholder="option-C" required><br>
		D:<input type="text" name="op4" placeholder="option-D" required><br>
		<select name="ans" required>
			<option value="">CORRECT ANSWER</option>
			<option value="1">A</option>
			<option value="2">B</option>
			<option value="3">C</option>
			<option value="4">D</option>
		</select>&emsp;&emsp;
		<select name="tid" required>
			<option value="">Select Test</option>
		  <?php		  
		  foreach($admin->alltestIds as $tad)
		  {  ?>			  			
			<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'].' : '.$tad['tdate'];?></option>
			<?php   }?>
		</select>
		<br><br>
		<button type="submit" class="button">Add Question</button>
	</form></center><br>
	</div>
	<div id="test_stat">

		<br><center>
			<a style="border: 2px black solid; border-radius: 4px; font-weight: bold; font-size: 18px;" onclick="swap5()">Add Test</a>&emsp;&emsp;
			<a style="border: 2px black solid; border-radius: 4px; font-weight: bold; font-size: 18px;" onclick="swap4()">Test Status</a> &emsp;&emsp;&emsp;
			<a style="border: 2px black solid; border-radius: 4px; font-weight: bold; font-size: 18px;" onclick="swap6()">Delete Test</a>		
		<div id="dele">
			<br><br><center>
			<form method="POST" action="#">
				<select name="tid" required>
					<option value="">Select Test</option>
		  				<?php		  
		  					foreach($admin->alltestIds as $tad)
		  					{  ?>			  			
							<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'].' : '.$tad['tdate'];?></option>
							<?php   }?>
				</select> &emsp;&emsp;
			<br><br>
			<input type="submit" onclick="alert('This feature is not available for now')" value="Delete" class="button"/>
			<br>	
			</form>
			<br>
			</center>
		</div>

		</center>
		<div id="toggle">
		<br>
		<center><h4>Toggle Test Status</h4>
		<form method="POST" action="toggle.php">
			<select name="tid" required>
			<option value="">Select Test</option>
		  <?php		  
		  foreach($admin->alltestIds as $tad)
		  {  ?>			  			
			<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'].' : '.$tad['tdate'];?></option>
			<?php   }?>
			</select> &emsp;&emsp;
			<select name="stat" required>
				<option value="">select status</option>
				<option value="0">Inactive</option>
				<option value="1">Active</option>
			</select><br><br>
			<input type="submit" value="Done" class="button"/>
		</form>
		</center>
		<br>
		</div>
		<div id="append_table">
			<br><br>
			<center><form method="POST" action="add_test.php">
				<input type="text" name="tname" placeholder="enter name of test" required>
				<input type="text" name="tid" placeholder="enter Table Index" required>
				<br><br>
			<input type="submit" value="Done" class="button"/>
			</form></center>
			<br><br>			
		</div>
	</div>

	<div id="results">
		<br><br>
		<center><form method="GET" action="leaderboard.php" target="_blank">
			<select name="testid" required>
				<option value="">Select Test</option>
				<?php		  
		  			foreach($admin->alltestIds as $tad)
		  			{  ?>			  			
					<option value="<?php echo $tad['tid'];?>"><?php echo $tad['tname'].' : '.$tad['tdate'];?></option>
				<?php   }?>
			</select><br><br>
			<input type="submit" value="Fetch" class="button"/>
		</form></center><br><br>			
	</div>

	</div>
	<center>
	<button style="border: 2px solid red; padding: 5px; border-radius: 8px; margin: auto; color: white; background-color: #333; font-weight: bold;" onclick="location.href='../logout.php'">Log Out</button>
	</center>
</body>
</html>

<?php
    include("../class/users.php");
    extract($_GET);
    $display = new users;
    $display->leaderboard($testid); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consolidated Results</title>
	<style type="text/css">
		<style>
			table {
			    border-collapse: collapse;
			    width: 100%;
			    top: 20px;
			}

			th, td {
			    text-align: left;
			    padding: 8px;
			}

			tr:nth-child(even){background-color: #f2f2f2}

			th {
			    background-color: #4CAF50;
			    color: white;
			}
					
	</style>
</head>

<body>
	<center>	
	<table >
		<th>Roll Number</th>
		<th>Name</th>
		<th>Score</th>

		<?php foreach ($display->res as $show){?>
			<tr>
				<td><?php echo $show['uid'];?></td>
				<td><?php echo $show['student_name'];?></td>
				<td><?php echo $show['result'];?></td>
			</tr>
		<?php } ?>
	</table><br><br>

</body>

</html>
<?php
    include("class/users.php");
    if (!isset($_SESSION['uid'])){
    	header("Location: index.php");
      } 
    $ans=new  users;
    $answer=$ans->answer($_POST,$_SESSION['test_cat']);
    $tc=$_SESSION['test_cat'];
    $roll=$_SESSION['uid'];
    $nm=$_SESSION['student_name'];
    $mark=$_SESSION['score'];
    if($ans->mul_attempt($_SESSION['uid'],$_SESSION['test_cat'])){

      $query="INSERT INTO result (test_id, uid, student_name, result) VALUES ($tc, $roll, '$nm', $mark)";
        if(!$ans->signup($query)){
          echo "Error Saving your Record. Summon technical Help!";
        }
    } else{ $temp=1; }
  ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="apti_assets/style.css">
	<title>Result</title>
</head>
<body>
	<center>
	<?php
	$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
	$attempt_qus=$answer['right']+$answer['wrong'];
	?><br><br>
  <h3>Your Aptitude Test Result</h2>
  <table>
    <thead></thead>
      <tr>
        <th style="float: left; font-weight: normal;">Total Questions: </th>
        <th style="float: right; font-weight: normal;"><?php echo $total_qus; ?></th>
      </tr>
      <tr >
        <td>Attempted qusetions: </td>
        <td><?php echo $attempt_qus;?></td>
      </tr>
      <tr >
        <td>Right answer: </td>
        <td><?php echo $answer['right'];?></td>
      </tr>
      <tr >
        <td>Wrong answer: </td>
        <td><?php echo $answer['wrong'];?></td>
      </tr>
	     <tr >
        <td>No answer: </td>
        <td><?php echo $answer['no_answer'];?></td>
      </tr>
	  <tr >
        <td>Your result: </td>
        <td><?php 
		$per=($answer['right']*100)/($total_qus);
		
		echo $per."%";
		?></td>
      </tr>
  </table><br><br>
  <center>
  <button class="button" onclick="location.href='logout.php'">Done</button></center>
  <br><br><center><font color="red">
  <?php
    if($temp==1){
      echo "Note: Your marks will not be updated because you've given same test before.";
    }
  ?> </font></center>
</body>
</html>
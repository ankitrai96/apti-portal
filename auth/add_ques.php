<?php
include("../class/users.php");
$register=new users;
extract($_POST);
$query="INSERT INTO questions (question, tid, ans1, ans2, ans3, ans4, ans) VALUES ('$q', $tid, '$op1', '$op2', '$op3', '$op4', $ans)";
	if($register->signup($query))
  		{
			$register->url("cPanel.php?task=success");
  		} 
?>
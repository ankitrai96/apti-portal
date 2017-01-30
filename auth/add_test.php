<?php
	include("../class/users.php");
	$register=new users;
	extract($_POST);
	if($register->mul_test($tid,$tname)){
		$query="INSERT INTO tests (tid, status, tname) VALUES ($tid, 0, '$tname')";
		if($register->signup($query))
  			{
				$register->url("cPanel.php?task=success");
  		}

  	} else {
  		$register->url("cPanel.php?task=failed");
  	} 
?>
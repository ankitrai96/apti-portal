<?php
include("../class/users.php");
$register=new users;
extract($_POST);
if($register->mul_signup($uid)){
	$query="INSERT INTO users (first, last, uid, pwd) VALUES ('$first', '$last', '$uid', '$pwd')";
	if($register->signup($query))
  		{
			$register->url("../index.php?up=success");
  		}
	} 
	else {
			$register->url("../index.php?up=exists");	
	}
?>
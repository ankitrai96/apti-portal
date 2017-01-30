<?php
include("../class/users.php");
$register=new users;
extract($_POST);
$query="UPDATE tests SET status='$stat' WHERE tid='$tid'";
	if($register->signup($query))
  		{
			$register->url("cPanel.php?task=success");
  		} 
?>
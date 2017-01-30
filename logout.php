<?php
include("class/user.php");
session_start();
session_unset();
header("Location: index.php");
mysqli_close($this->conn);
?>
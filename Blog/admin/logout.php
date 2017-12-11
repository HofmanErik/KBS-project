<?php


//var_dump($_SESSION);
//if (isset($_POST['submit'])) {
	session_start();
	session_unset();
	session_destroy();
	//session_write_close();
	header("Location: ../admin/login.php?logout=succes");
	exit();

  ?>

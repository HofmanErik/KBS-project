<?php

//Uitloggen
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../admin/login.php?logout=succes");
	exit();

  ?>

<?php

session_start();

if (isset($_POST['submit'])) {

	include "../admin/databaseconnectie.php";

	$email = $_POST['email'];
	$wwhash = $_POST['wwhash'];

	//Error handlers
	//Checken voor lege input
	if (empty($email) || empty($wwhash)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM medewerker WHERE email=:email";
		$stmt=$conn->prepare($sql);
		$stmt->bindValue(":email", $email);
		$stmt->execute();
		$resultCheck = $stmt->rowcount();
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
			if ($row = $stmt->fetch()) {
				//De-hashing wachtwoord
				$hashedPwdCheck = password_verify($wwhash, $row['wachtwoord']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Gebruiker inloggen
					$_SESSION['mnr'] = $row['mnr'];
					$_SESSION['voornaam'] = $row['voornaam'];
					$_SESSION['achternaam'] = $row['achternaam'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['functie'] = $row['functie'];
					$_SESSION['wachtwoord'] = $row['wachtwoord'];
					
					header("Location: ../admin/dashboard.php?login=succes");
					exit();
				//}
				//if($_SESSION['functie'] == 1) {
				//header("Location: ../admin/moddashboard.php?login=succes");
				//exit();
			//}
				}
			}
		}
	}
 }else {
	header("Location: ../index.php?login=error");
	exit();
}

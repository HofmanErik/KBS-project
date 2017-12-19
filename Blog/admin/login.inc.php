<?php

session_start();
//Inloggen
if (isset($_POST['submit'])) {

	include "../admin/databaseconnectie.php";

	$email = $_POST['email'];
	$wwhash = $_POST['wwhash'];

	//Error handlers
	//Checken voor lege input
	if (empty($email) || empty($wwhash)) {
		header("Location: ../index.php?login=empty");
		exit();
		//Checken of emailadres voorkomt in de database
	} else {
		$sql = "SELECT * FROM medewerker WHERE email=:email";
		$stmt=$conn->prepare($sql);
		$stmt->bindValue(":email", $email);
		$stmt->execute();
		$resultCheck = $stmt->rowcount();

		//Checken op resultaat: if result = 0  -> email bestaat niet
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();

			//Als email wel bestaat, checken of wachtwoord correct is
		} else {
			if ($row = $stmt->fetch()) {
				//De-hashing wachtwoord
				$hashedPwdCheck = password_verify($wwhash, $row['wachtwoord']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {

					//Checken of de gebruiker actief is
					if($row['actief']) {

					$mnr = $row['mnr'];
					$prep = $conn->prepare("INSERT INTO logboek (mnr,datum) VALUES ('$mnr',NOW())");
					$prep->execute();

					//Gebruiker inloggen
					$_SESSION['mnr'] = $row['mnr'];
					$_SESSION['voornaam'] = $row['voornaam'];
					$_SESSION['achternaam'] = $row['achternaam'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['functie'] = $row['functie'];
					$_SESSION['wachtwoord'] = $row['wachtwoord'];

					header("Location: ../admin/dashboard.php?login=succes");
					exit();
				}
					header("Location: ../admin/login.php?login=error");
					exit();
				}
			}
		}
	}
	//Als inloggen niet mogelijk is
 }else {
	header("Location: ../index.php?login=error");
	exit();
}

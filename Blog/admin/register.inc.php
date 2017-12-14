<?php

$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['opslaan'])) {

  //ingevulde gegevens ophalen met POST
	$voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
	$achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$functie = mysqli_real_escape_string($conn, $_POST['functie']);
	$wwhash = mysqli_real_escape_string($conn, $_POST['wwhash']);

	//Error handlers
	//Checken voor lege velden
	if (empty($voornaam)  || empty($achternaam) || empty($email) ||
	 empty($functie) || empty($wwhash)) {
		header("Location: ../admin/register.php?signup=empty");
		exit();
	} else {
		//Checken of ingevoerde characters kloppen
		if (!preg_match("/^[a-zA-Z' -]*$/", $voornaam) || !preg_match("/^[a-zA-Z' -]*$/", $achternaam)) {
			header("Location: ../admin/register.php?signup=invalid");
			exit();
		} else {
			//Checken of e-mail klopt
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../admin/register.php?signup=invalidemail");
				exit();
			} else {
				$sql = "SELECT * FROM medewerker WHERE mnr='$mnr'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../admin/register.php?signup=usertaken");
					exit();
				} else {
					//Hashing wachtwoord
					$options = ['cost' => 12];
					$hashedPwd = password_hash($wwhash, PASSWORD_BCRYPT, $options);
					//Gebruiker in de database invoeren
					$sql = "INSERT INTO medewerker (voornaam, achternaam, email, functie, wwhash)
					VALUES ('$voornaam', '$achternaam', '$email', '$functie', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../admin/dashboard.php?signup=succes");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../admin/register.php");
	exit();
}

?>

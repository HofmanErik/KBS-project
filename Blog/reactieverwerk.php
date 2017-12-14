<?php

// Database connectie
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";

try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    	echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST["submit"])){
		$artikelnr = $_POST["artikelnr"];
		$voornaam = $_POST["naam"];
		$achternaam = $_POST["achternaam"];
		$email = $_POST["email"];
		$reactie = $_POST["reactie"];
		$rating = $_POST["rating"];

$sql = "INSERT INTO bezoeker (voornaam,achternaam,email)
		VALUES ('$voornaam','$achternaam','$email')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

$sql = "SELECT *
		FROM bezoeker
		WHERE voornaam = '$voornaam'
		AND achternaam = '$achternaam'
		AND email = '$email'";

       	$stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $bezoekernr = $row['bezoekernr'];

$sql = "INSERT INTO rating (artikelnr,bezoekernr,comment,rating)
		VALUES ($artikelnr,'$bezoekernr','$reactie', $rating)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header('location: blogpost.php?artikelnr='.$artikelnr.'');
}

?>

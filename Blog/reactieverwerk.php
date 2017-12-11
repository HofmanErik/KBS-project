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
    $sql = "SELECT * FROM rating";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "SELECT * FROM bezoeker";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

if(isset($_POST["submit"])){
	$artikelnr = $_POST["artikelnr"];
	$naam = $_POST["naam"];
	$email = $_POST["email"];
	$reactie = $_POST["reactie"];
	$rating = $_POST["rating"];

$sql = "INSERT INTO bezoeker(voornaam,tussenvoegsel,achternaam,email)
		VALUES ('$naam','$naam','$naam','$email')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

$sql = "INSERT INTO rating(artikelnr,naam,email,tekst,rating,status)
		VALUES ($artikelnr,'$naam','$email','$reactie',$rating,1)";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	header('location: blogpost.php?artikelnr=$artikelnr');
}

?>
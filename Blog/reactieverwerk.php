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

//Als reactie wordt verzonden:
if(isset($_POST["submit"])){
  //Als rating leeg is, automatisch 5 sterren
  if(!isset($_POST['rating'])){
    $rating = 5;
  }elseif (isset($_POST['rating'])) {
    $rating = $_POST["rating"];
  }

		$artikelnr = $_POST["artikelnr"];
    $voornaam = $_POST["naam"];
		$achternaam = $_POST["achternaam"];
		$email = $_POST["email"];
		$reactie = $_POST["reactie"];

//Query bezoeker INSERT
$sql = "INSERT INTO bezoeker (voornaam,achternaam,email)
		VALUES ('$voornaam','$achternaam','$email')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

//Query bezoeker ophalen
$sql = "SELECT *
		FROM bezoeker
		WHERE voornaam = '$voornaam'
		AND achternaam = '$achternaam'
		AND email = '$email'";

       	$stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $bezoekernr = $row['bezoekernr'];

//Query bezoeker + rating INSERT rating tabel
$sql = "INSERT INTO rating (artikelnr,bezoekernr,reactie,sterwaarde,datum)
		VALUES ($artikelnr,'$bezoekernr','$reactie', $rating, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header('location: blogpost.php?plaatsen=succes&artikelnr='.$artikelnr.'');
}

?>

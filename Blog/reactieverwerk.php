<script type="text/javascript">
	function myFunctionReageren()
              {
              alert('Uw reactie wordt verzonden!');
              }
</script>

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
		$voornaam = preg_replace("/[^A-Za-z0-9]/", "", $_POST["naam"]);
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

$sql = "INSERT INTO rating (artikelnr,bezoekernr,tekst,rating)
		VALUES ($artikelnr,'$bezoekernr','$reactie', $rating)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header('location: blogpost.php?artikelnr='.$artikelnr.'');
}

?>

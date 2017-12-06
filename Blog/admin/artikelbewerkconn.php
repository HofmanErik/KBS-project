<?php
	if(isset($_POST['bewerk'])){

			$servername = "localhost";
			$username = "beheerder";	
			$password = "geheim";

			$artikelnr = $_POST['artikelnr'];

			try {
			//Creating connection for mysql
			$conn = new PDO("mysql:host=$servername;dbname=db_vindbaarin", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected successfully";
			}
			catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
			//sql query naam opslaan in database
			$sql = ("SELECT * FROM artikel WHERE artikelnr = $artikelnr");
    		$stmt = $conn->prepare($sql);
    		$stmt->execute();	

    		while ($row = $stmt->fetch()){

	    		$titel 		= $row['titel'];
	    		$tekst 		= $row['tekst'];
	    		$thumbnail 	= $row['thumbnail'];
	    		$auteur 	= $row['auteur'];
	    		$datum 		= $row['datum'];
	    		$afbeelding	= $row['afbeelding'];
	    		$status		= $row['status'];
	    		print ($titel);
	    		print ($tekst);
	    		print ($thumbnail);
	    		print ($auteur);
    		}
    		//header("location: artikelbewerk.php");


}





?>
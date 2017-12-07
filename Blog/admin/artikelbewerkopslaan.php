<?php
	if(isset($_POST['opslaan'])){
		$titel = $_POST['titel'];
		$tinymce = $_POST['tinymce'];
		
			$servername = "localhost";
			$username = "beheerder";	
			$password = "geheim";

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
			$mnr = 1;	
			//sql query naam opslaan in database
    		$prep = $conn->prepare("update medewerker SET email = '$newmail' WHERE mnr = '$mnr'"); 	
    		$prep->execute();	


	}
?>
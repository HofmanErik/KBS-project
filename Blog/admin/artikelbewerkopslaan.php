<?php

// Publiceren
	if(isset($_POST['publiceren'])){
		$titel = $_POST['titel'];
		$tinymce = $_POST['tinymce'];
		$artikelnr = $_POST['artikelnr'];

//database connectie
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
			//checken of er een file is door de filesize te checken
			if(($_FILES['thumbnail']['size']) != 0){

			  $file = $_FILES['thumbnail'];

			  $fileName = $_FILES['thumbnail']['name'];
			  $fileTmp = $_FILES['thumbnail']['tmp_name'];
			  $fileSize = $_FILES['thumbnail']['size'];
			  $fileError = $_FILES['thumbnail']['error'];

        $filename2 = $fileName;
			  $fileExt = explode('.', $fileName);
			  $fileActualExt = strtolower(end($fileExt));

			  $allow = array('jpg','jpeg','png');

				//kijken of het filetype klopt
			  if(in_array($fileActualExt, $allow)){
			    //kijken of er een error is tijdens uploaden
			    if($fileError === 0){
			      //kijken of het bestand niet te groot is
			      if($fileSize < 5000000){
							//file krijgt unieke naam
			        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $stmt = $conn->prepare("INSERT INTO thumbnail (thumbnaillocatie,thumbnailnaam) VALUES('$fileNameNew','$filename2')");
                    $stmt->execute();

			        $sql = ("UPDATE artikel SET titel = '$titel', thumbnail = '$fileNameNew', tekst = '$tinymce', status = '1' WHERE artikelnr = '$artikelnr'");
			        	print (" image");
			            $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
   						move_uploaded_file($fileTmp, $fileDestination);

			      }else{
			        header("location: overzicht.php?size");
			      }
			    }else{
			      header("location: overzicht.php?upload");
			    }
			  }else {
			    header("location: overzicht.php?filetype");
			  }


			}else{
				$sql = ("UPDATE artikel SET titel = '$titel', tekst = '$tinymce', status = '1' WHERE artikelnr = '$artikelnr'");
				print ("geen image");

			}
				//sql query, opslaan in database
    		$prep = $conn->prepare($sql);
    		$prep->execute();
    		header("location: overzicht.php?Postsucces");
	    }

//Concept
	if(isset($_POST['concept'])){
		$titel = $_POST['titel'];
		$tinymce = $_POST['tinymce'];
		$artikelnr = $_POST['artikelnr'];

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
			if(($_FILES['thumbnail']['size']) != 0){

			  $file = $_FILES['thumbnail'];

			  $fileName = $_FILES['thumbnail']['name'];
			  $fileTmp = $_FILES['thumbnail']['tmp_name'];
			  $fileSize = $_FILES['thumbnail']['size'];
			  $fileError = $_FILES['thumbnail']['error'];

                $filename2 = $fileName;
			  $fileExt = explode('.', $fileName);
			  $fileActualExt = strtolower(end($fileExt));

			  $allow = array('jpg','jpeg','png');

			  if(in_array($fileActualExt, $allow)){
			    //kijken of het filetype klopt
			    if($fileError === 0){
			      //kijken of er een error is tijdens uploaden
			      if($fileSize < 5000000){
			        //kijken of het bestand niet te groot is
			        $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                      $stmt = $conn->prepare("INSERT INTO thumbnail (thumbnaillocatie,thumbnailnaam) VALUES('$fileNameNew','$filename2')");
                      $stmt->execute();

			        $sql = ("UPDATE artikel SET titel = '$titel', thumbnail = '$fileNameNew', tekst = '$tinymce', status = '0' WHERE artikelnr = '$artikelnr'");
			        	print (" image");
			            $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
   						move_uploaded_file($fileTmp, $fileDestination);

			      }else{
			        header("location: overzicht.php?size");
			      }
			    }else{
			      header("location: overzicht.php?upload");
			    }
			  }else {
			    header("location: overzicht.php?filetype");
			  }


			}else{
				$sql = ("UPDATE artikel SET titel = '$titel', tekst = '$tinymce', status = '0' WHERE artikelnr = '$artikelnr'");
				print ("geen image");

			}

			//sql query, opslaan in database
    		$prep = $conn->prepare($sql);
    		$prep->execute();
    		header("location: overzicht.php?Draftsucces");

	}
?>

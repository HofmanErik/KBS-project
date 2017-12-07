<?php
	if(isset($_POST['Publiceren'])){
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmp = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allow = array('jpg','jpeg','png');

		if(in_array($fileActualExt, $allow)){
			//kijken of het filetype klopt
			if($fileError === 0){
				//kijken of er een error is tijdens uploaden
				if($fileSize < 500000){
					//kijken of het bestand niet te groot is
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;

					//database connectie
					$servername = "localhost";
					$username = "beheerder";
					$password = "geheim";
					$dbName = "db_vindbaarin";

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
					//$sql = "INSERT INTO image (image) VALUES ('$fileNameNew') ":
            		$prep = $conn->prepare("INSERT INTO artikel VALUES ('$fileNameNew') ");
            		$prep->execute();
						//afbeelding opslaan in folder
						$fileDestination = 'afbeeldingopslag/' . $fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
		 				header("location: imageupload.php?uploadsucces");

				}else{
					header("location: imageupload.php?size");
				}
			}else{
				header("location: imageupload.php?upload");
			}
		}else {
			header("location: imageupload.php?filetype");
		}
	}else{
		header("location: imageupload.php?error");
	}



?>

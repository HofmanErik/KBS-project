
<?php
session_start();

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
  //Als er op de button Publiceren geklikt wordt dan:
  if(isset($_POST['Publiceren'])){
    $valid = true;
    $filevalid = false;
    $file = $_FILES['thumbnail'];
    $fileName = $_FILES['thumbnail']['name'];
    $fileTmp = $_FILES['thumbnail']['tmp_name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $fileError = $_FILES['thumbnail']['error'];
    $fileExt = explode('.', $fileName);
    $filename2 = $fileName;
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg','jpeg','png');
    if(in_array($fileActualExt, $allow)){
      //kijken of het filetype klopt
      if($fileError === 0){
        //kijken of er een error is tijdens uploaden
        if($fileSize < 500000){
          //kijken of het bestand niet te groot is
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;
          $filevalid = true;
        }else{
          header("location: toevoegen.php?size");
        }
      }else{
        header("location: toevoegen.php?upload");
      }
    }else {
      header("location: toevoegen.php?filetype");
    }
    //Titel invoeren
    $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));

    $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));

    $auteurId = $_SESSION['mnr'];

    if($valid == true && $filevalid ==true){
        $stmt = $conn->prepare("INSERT INTO thumbnail (thumbnaillocatie,thumbnailnaam) VALUES('$fileNameNew','$filename2')");
      $stmt->execute();

      $stmt = $conn ->prepare("INSERT INTO artikel (titel, tekst, thumbnaillocatie, mnr, datum, status)
                             VALUES ('$titel','$tekst','$fileNameNew', '$auteurId', NOW(), 1 )");
      $stmt->execute();
      //Hier worden de thumbnails opgeslagen
      $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
      move_uploaded_file($fileTmp, $fileDestination);
      header("Location: ../admin/toevoegen.php?artikel=Gepubliceerd");
    }
  }else{
    if(isset($_POST["Opslaan"])){
      $valid = true;
      $filevalid = false;
      $file = $_FILES['thumbnail'];
      $fileName = $_FILES['thumbnail']['name'];
      $fileTmp = $_FILES['thumbnail']['tmp_name'];
      $fileSize = $_FILES['thumbnail']['size'];
      $fileError = $_FILES['thumbnail']['error'];
      $fileExt = explode('.', $fileName);
        $filename2 = $fileName;
      $fileActualExt = strtolower(end($fileExt));
      $allow = array('jpg','jpeg','png');
      if(in_array($fileActualExt, $allow)){
        //kijken of het filetype klopt
        if($fileError === 0){
          //kijken of er een error is tijdens uploaden
          if($fileSize < 500000){
            //kijken of het bestand niet te groot is
            $fileNameNew = uniqid('', true) . "." . $fileActualExt;
            $filevalid = true;
          }else{
            header("location: toevoegen.php?size");
          }
        }else{
          header("location: toevoegen.php?upload");
        }
      }else {
        header("location: toevoegen.php?filetype");
      }
      //Titel invoeren
      $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));

      $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));

        $auteurId = $_SESSION['mnr'];

      if($valid == true && $filevalid ==true){
        $stmt = $conn->prepare("INSERT INTO thumbnail (thumbnaillocatie,thumbnailnaam) VALUES('$fileNameNew','$filename2')");
      $stmt->execute();

      $stmt = $conn ->prepare("INSERT INTO artikel (titel, tekst, thumbnaillocatie, mnr, datum, status)
                             VALUES ('$titel','$tekst','$fileNameNew', '$auteurId', NOW(), 0 )");
      $stmt->execute();
        //Hier worden de thumbnails opgeslagen
        $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
        move_uploaded_file($fileTmp, $fileDestination);
        header("Location: ../admin/toevoegen.php?artikel=Opgeslagen");
    }
  }
}

  $conn->close();
?>

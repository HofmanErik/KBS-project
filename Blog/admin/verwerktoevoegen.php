<?php include "../admin/header.php"; ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../admin/dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Toevoegen</li>
    </ol>
  </div>
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
<<<<<<< HEAD
=======

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
  //Als er op de button Publiceren geklikt wordt dan:
  if(isset($_POST['Publiceren'])){
    $valid = true;
    $filevalid = false;
<<<<<<< HEAD
    $file = $_FILES['thumbnail'];
=======

    $file = $_FILES['thumbnail'];

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
    $fileName = $_FILES['thumbnail']['name'];
    $fileTmp = $_FILES['thumbnail']['tmp_name'];
    $fileSize = $_FILES['thumbnail']['size'];
    $fileError = $_FILES['thumbnail']['error'];
<<<<<<< HEAD
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg','jpeg','png');
=======

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allow = array('jpg','jpeg','png');

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
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
<<<<<<< HEAD
=======

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
    //Titel invoeren
    $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));
    //checken of titel is ingevuld
    if(empty($titel)){
      echo '
      <div class="container-fluid">
        Vul alstublieft een titel in!
        </div>';
        $valid = false;
    }
<<<<<<< HEAD
=======

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
    $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));
    //checken of tekst is ingevuld
    if(empty($tekst)){
      echo'
      <div class="container-fluid">
        Vul alstublieft tekst in!
      </div>';
      $valid = false;
    }
<<<<<<< HEAD
=======

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
    if($valid == true && $filevalid ==true){
      $stmt = $conn ->prepare("INSERT INTO artikel (artikelnr, titel, tekst, thumbnail, auteur, datum, afbeelding, status)
                             VALUES ('?', '$titel','$tekst','$fileNameNew', '1', NOW(), '?', 1 )");
      $stmt->execute();
<<<<<<< HEAD
      //Hier worden de thumbnails opgeslagen
      $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
      move_uploaded_file($fileTmp, $fileDestination);
=======

      //Hier worden de thumbnails opgeslagen
      $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
      move_uploaded_file($fileTmp, $fileDestination);

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
      echo'
      <div class="container-fluid">
        Artikel is gepubliceerd!
      </div>';
    }
  }
<<<<<<< HEAD
=======

>>>>>>> 883c3ffc3599b3813f4649bb14fb2ad6da1adac2
  $conn->close();
?>
<?php include "../admin/footer.php"; ?>
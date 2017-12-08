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

  //Database connectie
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

  $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));
  //checken of titel is ingevuld
  if(empty($titel)){
    echo '
   <div class="container-fluid">
  <p class = \'error\'>Vul alsjeblieft een titel in</p>
  </div>';
    $valid = false;
  }
  $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));
  //checken of tekst is ingevuld
  if(empty($tekst)){
   echo '
   <div class="container-fluid">
  <p class = \'error\'>Vul alsjeblieft een tekst in</p>
  </div>';

   $valid = false;
}

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

            //Titel Toevoegen
            $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));
            //checken of titel is ingevuld
            if(empty($titel)){
              echo "<p class = 'error'>Vul altublieft een titel in</p>";
              $valid = false;
            }

            //tekst toevoegen
            $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));
            //checken of tekst is ingevuld
            if(empty($tekst)){
              echo "<p class = 'error'>Vul altublieft tekst in</p>";
              $valid = false;
            }

    echo '
  <div class="container-fluid">
  Artikel is gepubliceerd!
  </div>';
 }
}

              //Hier worden de thumbnails opgeslagen
              $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
              move_uploaded_file($fileTmp, $fileDestination);
              echo "Artikel is gepubliceerd!";
            }
          }

//close connection
$conn->close();

?>
<?php include "../admin/footer.php"; ?>

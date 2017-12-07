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

if(isset($_POST['Publiceren'])){
  $valid = true;
  $filevalid = false;

  $file = $_FILES['thumbnail'];

  $fileName = $_FILES['thumbnail']['name'];
  $fileTmp = $_FILES['thumbnail']['tmp_name'];
  $fileSize = $_FILES['thumbnail']['size'];
  $fileError = $_FILES['thumbnail']['error'];

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
        $filevalid = true;
      }else{
        header("location: imageupload.php?size");
      }
    }else{
      header("location: imageupload.php?upload");
    }
  }else {
    header("location: imageupload.php?filetype");
  }

  $titel = htmlentities(trim($_POST['titel'], ENT_QUOTES));
  //checken of titel is ingevuld
  if(empty($titel)){
    echo "<p class = 'eror'>Vul altublieft een titel in</p>";
    $valid = false;
  }
  $tekst= htmlentities(trim($_POST['tinymce'], ENT_QUOTES));
  //checken of tekst is ingevuld
  if(empty($tekst)){
   echo "<p class = 'eror'>Vul altublieft tekst in</p>";
   $valid = false;
}

<<<<<<< HEAD

  if($valid == true && $filevalid ==true){
    $stmt = $conn ->prepare("INSERT INTO artikel (artikelnr, titel, tekst, thumbnail, auteur, datum, afbeelding, status) VALUES ('?', '$titel','$tekst','$fileNameNew', '123', NOW(), '?', 1 )");
=======
  if($valid ==true){
    $stmt = $conn ->prepare("INSERT INTO artikel (artikelnr, titel, tekst, thumbnail, auteur, datum, afbeelding, status) VALUES ('?', '$titel','$tekst','', 1, NOW(), '?', 1 )");
>>>>>>> eb686fb65e0aff2e87791001f85e6fc552f9ea38
    $stmt->execute();

    $fileDestination = 'afbeeldingopslag/' . $fileNameNew;
    move_uploaded_file($fileTmp, $fileDestination);

    echo "Artikel is gepubliceerd!";
 }
}


$conn->close();

?>
<?php include "../admin/footer.php"; ?>

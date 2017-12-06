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

  if($valid ==true){
    $stmt = $conn ->prepare("INSERT INTO artikel (artikelnr, titel, tekst, thumbnail, auteur, datum, afbeelding, status) VALUES ('?', '$titel','$tekst','', '123', NOW(), '?', 1 )");
    $stmt->execute();
    echo "Artikel is gepubliceerd!";
 }
}

$conn->close();

?>
<?php include "../admin/footer.php"; ?>

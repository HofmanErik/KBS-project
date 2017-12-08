<?php include 'header.php';?>
 <?php

if(!isset($_GET["artikelnr"])){
  header("location: index.php");
}else{
  $artikelnr = $_GET["artikelnr"];


  $servername = "localhost";
  $username = "beheerder";
  $password = "geheim";
  $dbname = "db_vindbaarin";
  $sql = "SELECT artikelnr, titel, tekst, thumbnail, datum, voornaam FROM artikel a
          JOIN medewerker m ON a.auteur = m.mnr WHERE artikelnr = :artikel1";


  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare($sql);
      $stmt -> bindValue(':artikel1', $artikelnr, PDO::PARAM_INT);
      $stmt->execute();
  } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }

  while ($row = $stmt->fetch()) {
      $titel = $row['titel'];
      $tekst = $row['tekst'];
      $thumbnail = $row['thumbnail'];
      $datum = $row['datum'];
      $voornaam = $row['voornaam'];
      $thumbnail = $row["thumbnail"];
      if($row["thumbnail"] == ""){
      $thumbnail = "download.png";
              }
      $thumbsource = "admin/afbeeldingopslag/" . $thumbnail;
  }
}


?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('laptop-hero.jpeg')">
      <div class="overlay"></div>
        <div class="container">
          <div class="row">

          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= $titel; ?></h1>
              <h2 class="subheading"></h2>
                <span class="meta">Posted by
                <a href="#"><?= $voornaam; ?></a>
                on <?= $datum; ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-6 mx-auto">
            <?= '<img src="'.$thumbsource.'" alt="'.$thumbsource.'"class="img-responsive blogimg">' ?>
          </div>
          <div class="col-lg-10 col-md-12 mx-auto">
            <?= htmlspecialchars_decode(stripslashes($tekst)) ; ?>
          </div>
        </div>
      </div>
    </article>

    <hr>
<?php include 'footer.php';?>
</html>

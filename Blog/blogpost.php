<?php include 'blank-template.php'?>

 <?php

if(!isset($_GET["artikelnr"])){
  header("location: index.php");
}else{
  $artikelnr = $_GET["artikelnr"];


  $servername = "localhost";
  $username = "beheerder";
  $password = "geheim";
  $dbname = "db_vindbaarin";
  $sql = "SELECT artikelnr, titel, tekst, thumbnail, datum, voornaam FROM artikel a JOIN medewerker m ON a.auteur = m.mnr WHERE artikelnr = :artikel1";


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

  }
}


        ?>


        <div class="container">
          <div class="row title">
            <div class="col-md-8">
              <div class="title-post">
                <h1><?= $titel; ?> </h1>
                  <p class="post-meta">Posted by
                    <a href="#"><?= $voornaam; ?></a>
                      <?= $datum; ?></p>
              </div>
            </div>
            <div class="col-md-4">

              <img src= <?= $thumbnail; ?>
                    class="img-responsive post-img">
            </div>

          </div>
        </div>




        <div class="container">
          <div class="row text">
            <div class="col-md-8 col-md-offset-2">
              <div class="post-text">
                <?= htmlspecialchars_decode(stripslashes($tekst)) ; ?>

                </div>
              </div>
            </div>
          </div>






<?php include 'modules/footer.php'; ?>

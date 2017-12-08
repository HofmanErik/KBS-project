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
    <header class="masthead" style="background-image: url('nieuw.jpg')">
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
<hr>
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12 mx-auto">
            <?= htmlspecialchars_decode(stripslashes($tekst)) ; ?>
          </div>
        </div>
      </div>
    </article>

    <hr><hr>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 mx-auto">
          <span>3 Comments</span>
          <p><b>Shanna van Grevengoed </b><br>
          <i>24 oktober, 2017 at 23:01</i>
          <img src="img/5-star-rating.png" class="img-responsive starimg"><br>
          Wat een leuk blog! Ik heb dit met veel plezier gelezen, Ik geef 5 sterren.<br>
          </p><hr>
          <p><b>Shanna van Grevengoed </b><br>
          <i>24 oktober, 2017 at 23:01</i>
          <img src="img/5-star-rating.png" class="img-responsive starimg"><br>
          Wat een leuk blog! Ik heb dit met veel plezier gelezen, Ik geef 5 sterren.<br>
          </p><hr>
          <p><b>Shanna van Grevengoed </b><br>
          <i>24 oktober, 2017 at 23:01</i>
          <img src="img/5-star-rating.png" class="img-responsive starimg"><br>
          Wat een leuk blog! Ik heb dit met veel plezier gelezen, Ik geef 5 sterren.<br>
          </p><hr>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-12 mx-auto">
          <span>Leave a comment</span>
          <p>Het e-mailadres wordt niet gepubliceerd. Vereiste velden zijn gemarkeerd met *</p>
          <form>
            <p>
              <label for="author">Naam
                <span class="required">*</span>
              </label> 
                <input id="author" name="author" placeholder="" value="" size="30" aria-required="true" required="required" type="text">
            </p>
            <p>
              <label for="author">Email 
                <span class="required">*</span>
              </label> 
              <input id="author" name="author" placeholder="" value="" size="30" aria-required="true" required="required" type="text">
            </p>
            <p>
              <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4.5" />
                <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3.5" />
                <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2.5" />
                <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1.5" />
                <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="0.5" />
                <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
              </fieldset>
              <span class="required">*</span>
            </p>
            <p>
              <textarea id="comment" name="comment" cols="58" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
            </p>
            <p>
              <input type="submit" class="btn btn-secondary" value="Reactie plaatsen" href="#">
            </p>
          </form>
        </div>
      </div>
    </div> 
    <hr>
<?php include 'footer.php';?>


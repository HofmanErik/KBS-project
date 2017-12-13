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

  try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
  }

  $sql = "SELECT *
          FROM artikel a
          JOIN medewerker m ON a.auteur = m.mnr
          WHERE artikelnr = :artikel1";
          $stmt = $conn->prepare($sql);
          $stmt -> bindValue(':artikel1', $artikelnr, PDO::PARAM_INT);
          $stmt->execute();

  while ($row = $stmt->fetch()) {
          $titel = $row['titel'];
          $tekst = $row['tekst'];
          $thumbnail = $row['thumbnail'];
          $datum = $row['datum'];
          $voornaam = $row['voornaam'];
          $thumbnail = $row["thumbnail"];
          $artikelnr = $row["artikelnr"];
          $thumbsource = "admin/afbeeldingopslag/" . $thumbnail;
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
                  <a href=""><?= $voornaam; ?></a>
                  on <?= $datum; ?></span>
              </div>
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
    <hr>
    <div class="container text">
      <div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
          <span><h5>Comments</h5></span>
        </div>
      </div>

<?php
      $sql = "SELECT *
              FROM rating r
              JOIN bezoeker b
              ON r.bezoekernr = b.bezoekernr
              WHERE artikelnr = :artikel1
              AND status = 1"
              ;

              $stmt = $conn->prepare($sql);
              $stmt -> bindValue(':artikel1', $artikelnr, PDO::PARAM_INT);
              $stmt->execute();
              $row = $stmt->fetch()
?>

<?php
if($row["datum"] != ''){
      while ($row = $stmt->fetch()) {
              $antwoordweergeven = "antwoordweergeven".$row["ratingnr"];
              $voornaam = $row["voornaam"];
              $achternaam = $row["achternaam"];
              $datum = $row["datum"];
              $tekst = $row["comment"];
              $rating = $row["rating"];



              echo('
                <div class="row">
                  <div class="col-lg-6 col-md-12 mx-auto">
                    <p>
                    <img alt="" src="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=40&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=80&amp;d=mm&amp;r=g 2x" class="img-circle" height="40" width="40"> <b>'.ucfirst($voornaam)." ".ucfirst($achternaam).'</b><br>
                    <i>'.$datum.'</i>');
// starrating vanuit database
                      for($i=1;$i<=$rating;$i++) {
                          echo ' <span class="fa fa-star"></span>';
                      }
                      if (strpos($rating,'.')) {
                          echo ' <span class="fa fa-star-half-o"></span>';
                          $i++;
                      }
                      while ($i<=5) {
                          echo ' <span class="fa fa-star-o"></span>';
                          $i++;
                      }
                    //?>
                          <script>
                            function antwoordweergeven() {
                            var x = document.getElementById("myDIV");
                            if (x.style.display === "none") {
                            x.style.display = "block";
                        } else {
                            x.style.display = "none";
                        }
                    }
                          </script>
                    <?php
                    echo('<br>
                    '.$tekst.'</p>
                     <button onclick="antwoordweergeven()">Antwoorden bekijken</button>
                    <div id="myDIV">
                    <p class="text-right"><img alt="" src="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=40&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=80&amp;d=mm&amp;r=g 2x" class="img-circle" height="40" width="40"> <b>Vindbaar In</b>
                    <br>
                    <i>'.$datum.'</i><br>
                    Hoi '.ucfirst($voornaam)." ".ucfirst($achternaam).',
                    Dankjewel voor je bericht!
                    Fijne dag,
                    Vindbaar in</p>
                    <hr><hr>
                    </div>
                  </div>
                </div>

                  ');
      }
    }
  }
?>
      <div class="row">
        <div class="col-lg-6 col-md-12 mx-auto">
          <span><h5>Leave a comment</h5></span>
          <p>Het emailadres wordt niet gepubliceerd. Vereiste velden zijn gemarkeerd met *</p>
          <form method="POST" action="reactieverwerk.php">
            <input type=hidden name="artikelnr" value=<?='"'.$artikelnr.'"'; ?>>
            <table>
              <tr>
                <td>
                  <label for="Naam">Naam
                    <span class="required">*</span>
                  </label>
                </td>
                <td>
                  <input id="author" name="naam" placeholder="" value="" size="30" aria-required="true" required="required" type="text">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="Naam">Achternaam
                    <span class="required">*</span>
                  </label>
                </td>
                <td>
                  <input id="author" name="achternaam" placeholder="" value="" size="30" aria-required="true" required="required" type="text">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="author">Email
                    <span class="required">*</span>
                  </label>
                </td>
                <td>
                  <input id="author" name="email" placeholder="" value="" size="30" aria-required="true" required="required" type="text">
                </td>
              </tr>
              <tr>
                <td>
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
                </td>
              </tr>
              </table>
            <p>
              <textarea id="comment" name="reactie" cols="58" rows="8" maxlength="65525"></textarea>
            </p>
            <p>
              <input type="submit" class="btn btn-primary" name="submit" value="Reactie plaatsen" onclick="myFunction()">
              <script>
                function myFunction() {
                  alert("Uw reactie wordt verzonden!");
                }
              </script>
            </p>
          </form>
        </div>
      </div>
    </div>

    <hr>
<?php include 'footer.php';?>

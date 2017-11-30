<?php include 'blank-template.php'?>

<!--Databaseconnectie-->
<?php
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";

?>
<div class="container">
  <div class="row title">
    <div class="col-md-8">
      <div class="title-post">
        <?php
        $sql = "SELECT Titel FROM artikel WHERE artikelnr = 3";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        while ($row = $stmt->fetch()) {

            print("<h1>" . $row["Titel"] . "</h1>");

        }

        ?>
          <p class="post-meta"><?php

              $sql = "SELECT voornaam FROM medewerker m JOIN artikel a ON m.mnr = a.auteur WHERE artikelnr = 3";

              try {
                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
              } catch (PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
              }

              while ($row = $stmt->fetch()) {

                  print("Posted by " . "<a href= https://vindbaar-in.nl/>" . $row["voornaam"] . "</a>" );

              }

              ?>
            <?php

            $sql = "SELECT datum FROM artikel WHERE artikelnr = 3";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            while ($row = $stmt->fetch()) {

                print("on " . $row["datum"] );

            }

            ?></p>
      </div>
    </div>
    <div class="col-md-4">

      <img src="download.png" alt="vierkantje"
            class="img-responsive post-img">
    </div>

  </div>
</div>

          <div class="container">
            <div class="row text">
              <div class="col-md-10 col-md-offset-1">
                <div class="post-text">
        <?php
        $sql = "SELECT tekst FROM artikel WHERE artikelnr = 3";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        while ($row = $stmt->fetch()) {
            print("<p>" .  $row["tekst"] . "</p>");
        }

        ?>
      </div>
    </div>
  </div>
</div>

<?php include 'modules/footer.php'; ?>

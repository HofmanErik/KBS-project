<?php include 'blank-template.php'?>

<div class="container">
  <div class="row title">
    <div class="col-md-8">
      <div class="title-post">
        <h1>  <?php
        $servername = "localhost";
        $username = "beheerder";
        $password = "geheim";
        $dbname = "db_vindbaarin";
        $sql = "SELECT artikelnr, titel, tekst, datum, voornaam FROM artikel a JOIN medewerker m ON WHERE artikelnr = 66";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        while ($row = $stmt->fetch()) {
            print("<tr>");
            print("<td><h1>" . $row["Titel"] . "</h1></td>");
            print("</tr>");
        }

        ?></h1>
          <p class="post-meta">Posted by
            <a href="#">Vindbaar In</a>
            <?php
            $servername = "localhost";
            $username = "beheerder";
            $password = "geheim";
            $dbname = "db_vindbaarin";
            $sql = "SELECT datum FROM artikel WHERE artikelnr = 66";


            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            while ($row = $stmt->fetch()) {
                print("<tr>");
                print("<td>" . "on " . $row["datum"] . "</td>");
                print("</tr>");
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
        <p><?php
        $servername = "localhost";
        $username = "beheerder";
        $password = "geheim";
        $dbname = "db_vindbaarin";
        $sql = "SELECT tekst FROM artikel WHERE artikelnr = 66";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        while ($row = $stmt->fetch()) {
            print("<tr>");
            print("<td>" .  $row["tekst"] . "</td>");
            print("</tr>");
        }

        ?></p>
      </div>
    </div>
  </div>
</div>

<?php include 'modules/footer.php'; ?>

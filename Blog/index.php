<?php include 'modules/menu.php'; ?>


<br></br>
  <!-- Blog Posts -->
  <div class="container">
  <div class="row blogposts">
    <div class="col-md-3">
      <img src="download.png" alt="vierkantje"
      class="img-responsive blogimg">
    </div>
    <div class="col-md-9">
      <div class="post-preview">
          <h2 class="post-title">
          <?php
          $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
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
              print("<tr>");
              print("<td><h2>" . $row["Titel"] . "</h2></td>");
              print("</tr>");
          }

          ?>
          </h2>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Vindbaar In</a>
        <?php   $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
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
              print("<tr>");
              print("<td>" . "on " . $row["datum"] . "</td>");
              print("</tr>");
          }

          ?></p>

          <a href="blogpost2.php"> meer lezen --> </a>
      </div>
    </div>
  </div>
</div>

<hr>

<br></br>
  <!-- Blog Posts -->
  <div class="container">
  <div class="row blogposts">
    <div class="col-md-3">
      <img src="download.png" alt="vierkantje"
      class="img-responsive blogimg">
    </div>
    <div class="col-md-9">
      <div class="post-preview">
          <h2 class="post-title">
          <?php
          $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT Titel FROM artikel WHERE artikelnr = 2";


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
              print("<td><h2>" . $row["Titel"] . "</h2></td>");
              print("</tr>");
          }

          ?>
          </h2>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Vindbaar In</a>
        <?php   $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT datum FROM artikel WHERE artikelnr = 2";


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

          <a href="blogpost.php"> meer lezen --> </a>
      </div>
    </div>
  </div>
</div>

<hr>

<br></br>
  <!-- Blog Posts -->
  <div class="container">
  <div class="row blogposts">
    <div class="col-md-3">
      <img src="download.png" alt="vierkantje"
      class="img-responsive blogimg">
    </div>
    <div class="col-md-9">
      <div class="post-preview">
          <h2 class="post-title">
          <?php
          $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT Titel FROM artikel WHERE artikelnr = 2";


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
              print("<td><h2>" . $row["Titel"] . "</h2></td>");
              print("</tr>");
          }

          ?>
          </h2>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Vindbaar In</a>
        <?php   $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT datum FROM artikel WHERE artikelnr = 2";


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

          <a href="blogpost.php"> meer lezen --> </a>
      </div>
    </div>
  </div>
</div>

<hr>

<br></br>
  <!-- Blog Posts -->
  <div class="container">
  <div class="row blogposts">
    <div class="col-md-3">
      <img src="download.png" alt="vierkantje"
      class="img-responsive blogimg">
    </div>
    <div class="col-md-9">
      <div class="post-preview">
          <h2 class="post-title">
          <?php
          $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT Titel FROM artikel WHERE artikelnr = 2";


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
              print("<td><h2>" . $row["Titel"] . "</h2></td>");
              print("</tr>");
          }

          ?>
          </h2>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Vindbaar In</a>
        <?php   $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT datum FROM artikel WHERE artikelnr = 2";


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

          <a href="blogpost.php"> meer lezen --> </a>
      </div>
    </div>
  </div>
</div>

<hr>


<?php include 'modules/footer.php'; ?>

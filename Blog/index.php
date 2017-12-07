<?php include 'modules/menu.php'; ?>



          <?php


          $servername = "localhost";
          $username = "beheerder";
          $password = "geheim";
          $dbname = "db_vindbaarin";
          $sql = "SELECT artikelnr, titel, thumbnail, datum, voornaam FROM artikel a JOIN medewerker m ON a.auteur = m.mnr WHERE status =1 ORDER BY datum DESC";


          try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare($sql);
              $stmt->execute();
          } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
          }

          while ($row = $stmt->fetch()) {
            $thumbnail = $row["thumbnail"];

              if($row["thumbnail"] == ""){
                $thumbnail = "download.png";
              }
              $thumbsource = "admin/afbeeldingopslag/" . $thumbnail;
echo '
            <div class="container">
 <div class="row blogposts">
   <div class="col-md-3">
     <img src="'.$thumbsource.'" alt="'.$thumbsource.'"
     class="img-responsive blogimg">
   </div>
   <div class="col-md-9">
     <div class="post-preview">
         <h2 class="post-title">
         <tr><td><h2>'.$row["titel"].'</h2></td></tr>          </h2>
       </a>
       <p class="post-meta">Posted by
         <a href="#">'.$row["voornaam"].'</a>
       <tr><td>on '.$row["datum"].'</td></tr></p>

        <a href="blogpost.php?artikelnr='.$row["artikelnr"].'"> meer lezen --> </a>
     </div>
   </div>
 </div>
</div>
<hr>

';
          }


          ?>

<?php include 'modules/footer.php'; ?>

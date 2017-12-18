<?php include 'header.php';?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('nieuw.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Blog</h1>
              <span class="subheading">Een blog door Vindbaar in</span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
<?php
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
                  JOIN medewerker m 
                  ON a.mnr = m.mnr 
                  WHERE status =1 
                  ORDER BY datum DESC";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();

          while ($row = $stmt->fetch()) {
                  $thumbnail = $row['thumbnaillocatie'];
                  $thumbsource = "admin/afbeeldingopslag/" . $thumbnail;


                  // preview
                  list($a,$b,$c,$rest) = explode(".",$row["tekst"]);
                  if($b == ''){
                    $text = $a;
                } else {
                  $tekst = ($a.$b.$c);
                  $tekst = htmlspecialchars_decode(stripslashes($tekst));
                }
                
          print('
            <div class="post-preview">
             <div class="row">
               <div class="col-md-3">
                <img src="'.$thumbsource.'" alt="'.$thumbsource.'"class="img-responsive blogimg2 bloground">
              </div>
              <div class="col-md-9">
                <a href="blogpost.php?artikelnr='.$row["artikelnr"].'">
                  <h2 class="post-title">
                  '.$row["titel"].'
                  </h2></a>
                  <h5 class="post-subtitle">
                  '.$tekst.'
                  </h5>
                  <a href="blogpost.php?artikelnr='.$row["artikelnr"].'">
                  <p><h6>Meer lezen ---></a></h6></p>
                <p class="post-meta">Posted by
                <a href="#">'.$row["voornaam"].'</a>
                '.$row["datum"].'</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-10 mx-auto">
            </div>
            <hr>
            <hr>');
          }
          ?>
          <!-- Pager -->
          <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Oudere posts &rarr;</a>
              </div> 
        </div>
      </div>
      <?php include 'footer.php';?>
      </div>

    





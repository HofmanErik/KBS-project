<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog door Vindbaar-in</title>

    <!-- Bootstrap stylesheet -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Extra stylesheet -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="https://www.Vindbaar-in.nl">Vindbaar in</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../blog/indexnieuw.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../blog/admin/login.php">Inloggen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('laptop-hero.jpeg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Blog</h1>
              <span class="subheading"></span>
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
print('    
          <div class="post-preview">
           <div class="row">
             <div class="col-md-3">
              <img src="'.$thumbsource.'" alt="'.$thumbsource.'"class="img-responsive blogimg">
              </div>
              <div class="col-md-9">
            <a href="blogpost.php?artikelnr='.$row["artikelnr"].'">
              <h2 class="post-title">
                '.$row["titel"].'
              </h2>
              <h5 class="post-subtitle">
                Hier komt een preview van de tekst alleen zijn we er nog niet helemaal over uit hoe
              </h5>
            </a>
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
<!--           <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div> -->
        </div>
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-code fa-stack-1x fa-inverse"></i>
                  </span>
              </li>
              <li class="list-inline-item">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-coffee fa-stack-1x fa-inverse"></i>
                  </span>
              </li>
              <li class="list-inline-item">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-hand-peace-o fa-stack-1x fa-inverse"></i>
                  </span>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; The floor is Java</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
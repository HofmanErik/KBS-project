<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog door Vindbaar in</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="https://www.vindbaar-in.nl">Vindbaar in</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../blog/index.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../blog/admin/login.php">Inloggen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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

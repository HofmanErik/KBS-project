<?php
session_start();
//kijken of er een sessie is gezet, anders word je terug gestuurd naar login.php
if(!isset($_SESSION['voornaam'])){
   header("Location:  ../admin/login.php");
}
?>
<!DOCTYPE html>
  <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Dashboard</title>
      <!-- Bootstrap core CSS-->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="../admin/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="https://www.vindbaar-in.nl">Vindbaar in</a>
          <!-- Hamburgermenu -->
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Hier begint de linker navbar -->
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
              <?php
              //checken voor moderator zo ja dan alleen reacties en instellingen tonen
              if($_SESSION['functie'] == '2') {

              ?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link"  href="../admin/dashboard.php">
                  <i class="fa fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reacties">
                <a class="nav-link" href="../admin/reacties.php">
                  <i class="fa fa-commenting"></i>
                  <span class="nav-link-text">Reacties</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Instellingen">
                <a class="nav-link" href="../admin/account.php">
                  <i class="fa fa-cog"></i>
                  <span class="nav-link-text">Instellingen</span>
                </a>
              </li>


            <?php }
              //checken voor beheerder zo ja dan alleen reacties en instellingen tonen
              if($_SESSION['functie'] == '0' || $_SESSION['functie'] == '1') {

              ?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link"  href="../admin/dashboard.php">
                  <i class="fa fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Artikelen">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse-artikelen"
                   data-parent="#exampleAccordion">
                   <i class="fa fa-pencil"></i>
                   <span class="nav-link-text">Artikelen</span>
                </a>
                 <ul class="sidenav-second-level collapse" id="collapse-artikelen">
                   <li>
                     <a href="../admin/overzicht.php">Overzicht</a>
                   </li>
                   <li>
                     <a href="../admin/toevoegen.php">Toevoegen</a>
                   </li>
                 </ul>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reacties">
                <a class="nav-link" href="../admin/reacties.php">
                  <i class="fa fa-commenting"></i>
                  <span class="nav-link-text">Reacties</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Instellingen">
                <a class="nav-link" href="../admin/account.php">
                  <i class="fa fa-cog"></i>
                  <span class="nav-link-text">Instellingen</span>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gebruikers">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse-gebruikers"
                   data-parent="#exampleAccordion">
                   <i class="fa fa-user"></i>
                   <span class="nav-link-text">Gebruikers</span>
                </a>
                 <ul class="sidenav-second-level collapse" id="collapse-gebruikers">
                   <?php if($_SESSION['functie'] == 0){
                   ?>
                   <li>
                     <a href="../admin/gebruikeroverzicht.php">Overzicht</a>
                   </li>
                 <?php } ?>
                   <li>
                     <a href="../admin/register.php">Toevoegen</a>
                   </li>
                 </ul>
              </li>
              <?php if($_SESSION['functie'] == 0){ ?>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Instellingen">
                <a class="nav-link" href="../admin/logboek.php">
                  <i class="fa fa-address-book-o"></i>
                  <span class="nav-link-text">Logboek</span>
                </a>
              </li>
              <?php } ?>              
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Voorbeeld">
                <a class="nav-link" href="../index.php" target="_blank">
                  <i class="fa fa-external-link"></i>
                  <span class="nav-link-text">Blog</span>
                </a>
              </li>
            </ul>
            <?php
            }
             ?>        
<!-- notificatie bel -->
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

$sql = "SELECT * FROM rating r
        WHERE r.status = 0";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();

?>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link mr-lg-2" id="messagesDropdown"
                   href="reacties.php">
                   <i class="fa fa-fw fa-bell-o"></i>
<!--   De notificatie bell krijgt een blauw balletje als er nieuwe reacties zijn -->
                   <?php
                   if($row["ratingnr"] != ''){
                       echo '<span class="d-lg-none">Meldingen
                         <span class="badge badge-pill badge-primary">3 Nieuw</span>
                       </span>
                       <span class="indicator text-primary d-none d-lg-block">
                         <i class="fa fa-fw fa-circle"></i>
                       </span>';
                   }
                   ?>
                </a>
                <!--Uitlog knop-->
              <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-fw fa-sign-out"></i>Uitloggen
                </a>
              </li>
            </ul>
          </div>
      </nav>

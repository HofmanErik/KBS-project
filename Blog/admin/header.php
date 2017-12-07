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
    <a class="navbar-brand" href="#">Vindbaar in</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
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
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"
             href="#collapse-instellingen" data-parent="#exampleAccordion">
            <i class="fa fa-cog fa-fw"></i>
            <span class="nav-link-text">Instellingen</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapse-instellingen">
            <li>
              <a href="../admin/account.php">Accountinstellingen</a>
            </li>
            <li>
              <a href="../admin/email.php">Emailinstellingen</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Voorbeeld">
          <a class="nav-link" href="../index.php" target="_blank">
            <i class="fa fa-external-link"></i>
            <span class="nav-link-text">Blog</span>
          </a>
        </li>
      </ul>
<!--       <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul> -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown"
             href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell-o"></i>
            <span class="d-lg-none">Meldingen
              <span class="badge badge-pill badge-primary">12 Nieuw</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Nieuwe meldingen:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Melissa Landwerd</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Leuk geschreven, 4 sterren!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Shanna van Grevengoed</strong>
              <span class="small float-right text-muted">21:21 AM</span>
              <div class="dropdown-message small">Ik vind dit niet leuk. Ik geef 1 ster.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Wesley</strong>
              <span class="small float-right text-muted">11:59 AM</span>
              <div class="dropdown-message small">Wesley heeft een review gegeven.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="../admin/reacties.php">Alle meldingen weergeven</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Uitloggen</a>
        </li>
      </ul>
    </div>
  </nav>

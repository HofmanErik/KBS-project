<?php
// Include bestanden
include '../../admin/header.php';
include '../header.php';
require '../classes/database.php';
?>

<link href="'../../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<div class="content-wrapper">
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../admin/dashboard.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overzicht</li>
  </ol>
  <div class="row">
    <div class="col-12">
        <h1><i class="fa fa-pencil"></i>
        <span class="">Overzicht</span><h1>
    </div>
  </div>
</div>
 <div class="card mb-3">
    <div class="card-header">
      <a href="../admin/overzicht.php"> Alles</a> |
      <a href="#"> Gepubliceerd</a> |
      <a href="#"> Concepten</a> |
      <a href="#"> Verwijderd</a> |
      <a href="../admin/toevoegen.php"> Toevoegen</a>
      <form class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Zoeken...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Titel</th>
              <th>Geschreven door</th>
              <th>Publiceerdatum</th>
              <th>Gepubliceerd</th>
              <th></th>
            </tr>
          </thead>
        </table>

      </div>
    </div>
    <div class="card-footer small text-muted">Laatst bijgewerkt "Time"</div>
  </div>
</div>

<?php include '../footer.php'; ?>
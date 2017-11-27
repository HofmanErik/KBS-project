<?php include 'header.php'; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Emailinstellingen</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Emailinstellingen</h1>
          <p></p>
        </div>
      </div>

      <div class="row">
      <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Emailadres wijzigen</h4>
        <p>Emailadres: <input type=text></p>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">Opslaan</a>
      </div>
    </div>
  </div>
        <div class="col-sm-5">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Voorkeuren wijzigen</h4>
        <p>Hoe vaak wil je updates ontvangen over nieuwe reacties?</p>
         <select>
          <option value="">Direct na plaatsing</option>
          <option value="">1 keer per dag</option>
          <option value="">1 keer per week</option>
          <option value="">1 keer per maand</option>
        </select>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">Opslaan</a>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>

<?php include 'footer.php'; ?>

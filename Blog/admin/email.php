<?php include '../admin/header.php'; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../admin/dashboard.php">Dashboard</a>
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
          <form action="emailupdate.php" method="POST">
            <p>Emailadres: <input type="email" name="mail1"></p>
            <p>Emailadres: <input type="email" name="mail2"></p>
            <input class="btn btn-primary" type="submit" name="emailsubmit" value="Opslaan">
          </form>
      </div>
    </div>
  </div>
        <div class="col-sm-5">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Voorkeuren wijzigen</h4>
        <p>Wil je updates ontvangen over nieuwe reacties?</p>
        <form action="emailupdate.php" method="POST">
            <input type="radio" name="janee" value="ja" >Ja<br>
            <input type="radio" name="janee" value="nee">Nee<br>
        <p class="card-text"></p>
        <input class="btn btn-primary" type="submit" name="statussubmit" value="Opslaan">
      </form>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>

<?php include '../admin/footer.php'; ?>

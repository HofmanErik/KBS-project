  <?php include '../admin/header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../admin/dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Account aanmaken</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Voornaam</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp"
                       placeholder="Voer voornaam in">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Achternaam</label>
                <input class="form-control" id="exampleInputLastName" type="text"
                       aria-describedby="nameHelp" placeholder="Voer achternaam in">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Emailadres</label>
            <input class="form-control" id="exampleInputEmail1" type="email"
                   aria-describedby="emailHelp" placeholder="Voer emailadres in">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Wachtwoord">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Bevestig wachtwoord</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Bevestig wachtwoord">
              </div>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="register.php">Opslaan</a>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</div>
</div>
<?php include '../admin/footer.php'; ?>

</html>

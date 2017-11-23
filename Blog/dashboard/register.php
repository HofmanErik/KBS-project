<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registreren</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

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
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Voer voornaam in">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Achternaam</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Voer achternaam in">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Emailadres</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Voer emailadres in">
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
          <a class="btn btn-primary btn-block" href="login.php">Account aanmaken</a>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Inloggen</a>
          <a class="d-block small" href="forgot-password.php">Wachtwoord vergeten?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>

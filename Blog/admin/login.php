<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Inloggen</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container-fluid">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Inloggen</div>
      <div class="card-body">
        <form method="POST" action="login.inc.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Emailadres/Naam</label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="text"
                    aria-describedby="emailHelp" placeholder="Voer emailadres">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Wachtwoord</label>
            <input class="form-control" id="exampleInputPassword1"
                   name="wwhash" type="password" placeholder="Wachtwoord">
          </div>
        <input class="btn btn-primary btn-block" type="submit" name="submit" value="inloggen">
        </form>
        <div class="text-center">
          <a class="d-block small" href="../admin/forgot-password.php">Wachtwoord vergeten?</a>
          <a class="d-block small" href="../index.php">Terug naar het blog</a>
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

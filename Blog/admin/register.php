  <?php include '../admin/header.php'; ?>
  <?php
    if($_SESSION['functie'] == 2) {
      header("location: ../admin/dashboard.php");
  }
  ?>
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
        <form action="register.inc.php" method="POST">
              <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Voornaam</label>
                <input class="form-control" name="voornaam" type="text" aria-describedby="nameHelp"
                       placeholder="Voer voornaam in">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputLastName">Achternaam</label>
                <input class="form-control" name="achternaam" type="text"
                       aria-describedby="nameHelp" placeholder="Voer achternaam in">
              </div>
            </div>

          <div class="form-row">
          <div class="col-md-6">
            <label for="exampleInputEmail1">Emailadres</label>
            <input class="form-control" name="email" type="email"
                   aria-describedby="emailHelp" placeholder="Voer emailadres in">
          </div>
        </div>
        <div class="form-row">
        <div class="col-md-6">
          <label>Functie</label>
          <select name="functie" method="POST">
            <option>--Maak een keuze--</option>
            <option value="2">Moderator</option>
            <option value="1">Beheerder</option>
          </select>
        </div>
      </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Wachtwoord</label>
                <input class="form-control" name="wwhash" type="password" placeholder="Wachtwoord">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Bevestig wachtwoord</label>
                <input class="form-control" name="wwhash" type="password" placeholder="Bevestig wachtwoord">
              </div>
            </div>
          </div>
          <input type="submit" name="opslaan" value="opslaan">
          <?php
          if(isset($_GET['signup'])){
          if($_GET['signup'] == "succes"){
          print("<font color='green'>* Gebruiker is aangemaakt! </font>");
        }}
          ?>
        <!--  <a href="register.inc.php">Opslaan</a>-->
        </form>
      </div>
    </div>
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
</div>
</div>
<?php include '../admin/footer.php'; ?>

</html>

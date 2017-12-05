<?php include '../admin/header.php';

        $servername = "localhost";
        $username = "erik";
        $password = "Welkom01";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=kbsdatabase", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conected succesfull <br><br>"; 
            }
        catch(PDOException $e)
            {
            echo "" . $e->getMessage();
            }
        
        $sql = 'SELECT achternaam, voornaam FROM medewerker';
            foreach ($conn->query($sql) as $row) {
                $achternaam = $row['achternaam'];
                $voornaam = $row['voornaam'];
            }
            if (isset($_POST["opslaan"])){
                $postvoornaam = $_POST['voornaam'];
                $postachternaam = $_POST["achternaam"];
                $sql = "UPDATE medewerker SET voornaam = '$postvoornaam', achternaam = '$postachternaam' WHERE mnr = 1";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $sql = 'SELECT achternaam, voornaam FROM medewerker';
            foreach ($conn->query($sql) as $row) {
                $achternaam = $row['achternaam'];
                $voornaam = $row['voornaam'];
            }
            }
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../admin/dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Accountinstellingen</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Account instellingen</h1>
        </div>
      </div>
      <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Naam wijzigen</h4>
        <form action="account.php" method ="POST">
        <p>Voornaam: <input type=text name="voornaam" value="<?php echo $voornaam; ?>"></p>
        <p>Achternaam: <input type=text name="achternaam" value="<?php echo $achternaam ?>"></p>
        <p class="card-text"></p>
        <input type="submit" name="Opslaan" value="Opslaan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Wachtwoord wijzigen</h4>
        <p>Oud wachtwoord: <input type=text></p>
        <p>Nieuw wachtwoord: <input type=text></p>
        <p>Herhaal wachtwoord: <input type=text></p>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">Opslaan</a>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
</div>

<?php include '../admin/footer.php'; ?>

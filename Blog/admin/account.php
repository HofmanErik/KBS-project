<?php include '../admin/header.php';
// Emailupdate
  if(isset($_POST['emailsubmit'])){
    $newmail = $_POST['mail'];

      $servername = "localhost";
      $username = "beheerder";  
      $password = "geheim";

      try {
      //Creating connection for mysql
      $conn = new PDO("mysql:host=$servername;dbname=db_vindbaarin", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      }
      catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
      $mnr = 1; 
      //sql query naam opslaan in database
        $prep = $conn->prepare("update medewerker SET email = '$newmail' WHERE mnr = '$mnr'");  
        $prep->execute(); 


  }
  // naam veranderen
  if (isset($_POST['opslaan'])){

      print ($_POST['achternaam']);
}



        $servername = "localhost";
        $username = "beheerder";
        $password = "geheim";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_vindbaarin", $username, $password);
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
                $mnr = $_SESSION['mnr'];

                $sql = "UPDATE medewerker SET voornaam = '$postvoornaam', achternaam = '$postachternaam' WHERE mnr = '$mnr'";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $sql = 'SELECT achternaam, voornaam FROM medewerker';
            foreach ($conn->query($sql) as $row) {
                $achternaam = $row['achternaam'];
                $voornaam = $row['voornaam'];
            }
            }
            if (isset($_POST["opslaan"])){
                $postvoornaam = $_POST['voornaam'];
                $postachternaam = $_POST["achternaam"];
<<<<<<< HEAD
                $mnr = $mnr = $_SESSION['mnr'];
                
                if($_POST["nieuwWachtwoord1"]){
                    
                }
=======
                $mnr = $_SESSION['mnr'];
>>>>>>> Melissa

                $sql = "UPDATE medewerker SET voornaam = '$postvoornaam', achternaam = '$postachternaam' WHERE mnr = '$mnr'";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
              }
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../admin/dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Instellingen</li>
      </ol>
        <div class="row">
            <div class="col-12">
                <h1><i class="fa fa-cog"></i>
                <span class="">Instellingen</span><h1>      
            </div>
        </div>
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Naam wijzigen</h4>
        <form action="account.php" method ="POST">
        <p class="card-text"></p>
        <p>Voornaam: <input type=text name="voornaam" value="<?php
        if(isset($_POST['voornaam'])){
          echo $_POST['voornaam'];
        }else{
          echo $voornaam;
        } ?>"></p>
        <p>Achternaam: <input type=text name="achternaam" value="<?php
        if(isset($_POST['achternaam'])){
          echo $_POST['achternaam'];
        }else{
          echo $achternaam;
        } ?>"></p>
        <p class="card-text"></p>
        <input type="submit" name="opslaan1" value="Opslaan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
        <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Emailadres wijzigen</h4>
          <form action="account.php" method="POST">
            <p>Emailadres: <input type="email" name="mail"></p>
            
            <input class="btn btn-primary" type="submit" name="emailsubmit" value="Opslaan">
          </form>
      </div>
    </div>
  </div>
    <div class="col-sm-6">
        <form action="account.php" method ="POST">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Wachtwoord wijzigen</h4>
        <p>Oud wachtwoord: <input type=text name="oudWachtwoord"></p>
        <p>Nieuw wachtwoord: <input type=text name="nieuwWachtwoord1"></p>
        <p>Herhaal wachtwoord: <input type=text name="nieuwWachtwoord2"></p>
        <p class="card-text"></p>
        <input type="submit" name="opslaan2" value="Opslaan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </form>
</div>
        <div class="col-sm-6">
    <div class="card">
      <div class="card-block">
        <h4 class="card-title">Voorkeuren wijzigen</h4>
        <p>Wil je een email melding ontvangen bij een nieuwe reactie?</p>
         <select>
          <option value="">Ja</option>
          <option value="">Nee</option>
        </select>
        <p class="card-text"></p>
        <a href="#" class="btn btn-primary">Opslaan</a>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>





<?php include '../admin/footer.php'; ?>

<?php

//header wordt opgehaald
include '../admin/header.php';



if (isset($_POST['opslaan'])) {

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
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
$mnr = $mnr = $_SESSION['mnr'];
$sql = "SELECT achternaam, voornaam FROM medewerker WHERE mnr = '$mnr'";
foreach ($conn->query($sql) as $row) {
    $achternaam = $row['achternaam'];
    $voornaam = $row['voornaam'];
}

$naamVeranderingResponse = " ";
if (isset($_POST["opslaan1"])) {
    $postvoornaam = $_POST['voornaam'];
    $postachternaam = $_POST["achternaam"];
    $mnr = $_SESSION['mnr'];

    $sql = "UPDATE medewerker SET voornaam = '$postvoornaam', achternaam = '$postachternaam' WHERE mnr = '$mnr'";
    $naamVeranderingResponse = "<font color='green'>* Bedankt uw naam is gewijzigd</font>";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = 'SELECT achternaam, voornaam FROM medewerker';
    foreach ($conn->query($sql) as $row) {
        $achternaam = $row['achternaam'];
        $voornaam = $row['voornaam'];
    }
}
$wwHerstelResponse1 = " ";
$wwHerstelResponse2 = " ";
if (isset($_POST["opslaan2"])) {
    $oudWachtwoord = $_POST["oudWachtwoord"];
    $nieuwWachtwoord1 = $_POST["nieuwWachtwoord1"];
    $nieuwWachtwoord2 = $_POST["nieuwWachtwoord2"];
    $mnr = $mnr = $_SESSION['mnr'];
    $wwhashOld = $_SESSION['wwhash'];

    $options = ['cost' => 12];
    $hashedpwd = password_hash($nieuwWachtwoord2, PASSWORD_BCRYPT, $options);
    $passwrdVerify = password_verify($oudWachtwoord, $wwhashOld);



    if ($passwrdVerify == FALSE) {
        $wwHerstelResponse1 = "<font color='red'>* Het oude wachtwoord klopt niet</font>";
    }
    if ($nieuwWachtwoord1 != $nieuwWachtwoord2 || $nieuwWachtwoord2 != $nieuwWachtwoord1) {
        $wwHerstelResponse2 = "<font color='red'>* Nieuwe wachtwoorden komen niet overeen</font>";
    } elseif ($passwrdVerify == TRUE && ($nieuwWachtwoord1 == $nieuwWachtwoord2)) {

        $sql = "UPDATE medewerker SET wwhash = '$hashedpwd' WHERE mnr = '$mnr'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $wwHerstelResponse1 = "<font color='green'>* Bedankt uw wachtwoord is gewijzigd</font>";
        $_SESSION['wwhash'] = $hashedpwd;
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
        <div class="container-fluid">
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
                                                    if (isset($_POST['voornaam'])) {
                                                        echo $_POST['voornaam'];
                                                    } else {
                                                        echo $voornaam;
                                                    }
                                                    ?>"></p>
                                                <p>Achternaam: <input type=text name="achternaam" value="<?php
                                                    if (isset($_POST['achternaam'])) {
                                                        echo $_POST['achternaam'];
                                                    } else {
                                                        echo $achternaam;
                                                    }
                                                    ?>"></p>
                                                <p><?php echo$naamVeranderingResponse; ?></p>
                                                <p class="card-text"></p>
                                                <input type="submit" name="opslaan1" value="Opslaan" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <form action="account.php" method ="POST">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Wachtwoord wijzigen</h4>
                                                <p>Oud wachtwoord: <input type=password name="oudWachtwoord"></p>
                                                <p>Nieuw wachtwoord: <input type=password name="nieuwWachtwoord1"></p>
                                                <p>Herhaal wachtwoord: <input type=password name="nieuwWachtwoord2"></p>
                                                <p><?php echo$wwHerstelResponse1; ?></p>
                                                <p><?php echo$wwHerstelResponse2; ?></p>
                                                <p class="card-text"></p>
                                                <input type="submit" name="opslaan2" value="Opslaan" class="btn btn-primary">
                                                </form>
                                            </div>
                                        </div>
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

                            
                            </div>
                            </div>
                            </div>
                            </div>


                            <?php include '../admin/footer.php'; ?>

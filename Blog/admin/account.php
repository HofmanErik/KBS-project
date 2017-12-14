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
    $verifyForm = $_POST["naamVerifyForm"];
    $wwhashOld = $_SESSION['wwhash'];
    $passwrdVerify = password_verify($verifyForm, $wwhashOld);
    $mnr = $_SESSION['mnr'];

    if ($passwrdVerify == TRUE) {

        $sql = "UPDATE medewerker SET voornaam = '$postvoornaam', achternaam = '$postachternaam' WHERE mnr = '$mnr'";
        $naamVeranderingResponse = "<font color='green'>* Bedankt uw naam is gewijzigd</font>";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        $naamVeranderingResponse = "<font color='red'>* Het wachtwoord klopt niet.</font>";
    }
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

$mailResetResponse1 = " ";
$mailResetResponse2 = " ";
$mailResetResponse3 = " ";

if (isset($_POST['emailsubmit'])) {
    $verifyForm = $_POST["mailVerifyForm"];
    $wwhashOld = $_SESSION['wwhash'];
    $passwrdVerify = password_verify($verifyForm, $wwhashOld);
    $mail1 = $_POST['mail1'];
    $mail2 = $_POST['mail2'];

    if ($passwrdVerify == FALSE) {
        $mailResetResponse1 = "<font color='red'>* Het wachtwoord klopt niet.</font>";
    }

    if ($mail1 == $mail2 && $passwrdVerify == TRUE) {
        $newmail = $_POST['mail1'];

        $servername = "localhost";
        $username = "beheerder";
        $password = "geheim";

        try {
            //Creating connection for mysql
            $conn = new PDO("mysql:host=$servername;dbname=db_vindbaarin", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $mnr = $_SESSION['mnr'];
        //sql query naam opslaan in database
        $prep = $conn->prepare("update medewerker SET email = '$newmail' WHERE mnr = '$mnr'");
        $prep->execute();
        $mailResetResponse1 = "<font color='green'>* Uw e-mail adres is gewijzigd.</font>";
    } else {
        $mailResetResponse2 = "<font color='red'>* De adressen komen niet overeen.</font>";
    }
}

if (isset($_POST['statussubmit'])) {
    $servername = "localhost";
    $username = "beheerder";
    $password = "geheim";

    try {
        //Creating connection for mysql
        $conn = new PDO("mysql:host=$servername;dbname=db_vindbaarin", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $mnr = $_SESSION['mnr'];

    if ($_POST['janee'] == 'ja') {
        print("ja");
        $stmt = $conn->prepare("update medewerker SET emailstatus = 1 WHERE mnr = '$mnr'");
        $stmt->execute();
    }
    if ($_POST['janee'] == 'nee') {
        print("nee");
        $stmt = $conn->prepare("update medewerker SET emailstatus = 0 WHERE mnr = '$mnr'");
        $stmt->execute();
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
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">Naam wijzigen</h4>
                                            <form action="account.php" method ="POST">
                                                <p class="card-text"></p>
                                                <p>Voornaam: <br><input type=text name="voornaam" value="<?php
                                                    if (isset($_SESSION['voornaam'])) {
                                                        echo $_SESSION['voornaam'];
                                                    } else {
                                                        echo $voornaam;
                                                    }
                                                    ?>"></p>
                                                <p>Achternaam: <br><input type=text name="achternaam" value="<?php
                                                    if (isset($_SESSION['achternaam'])) {
                                                        echo $_SESSION['achternaam'];
                                                    } else {
                                                        echo $achternaam;
                                                    }
                                                    ?>"></p>
                                                <p>Wachtwoord verificatie: <br><input type="password" name="naamVerifyForm">
                                                <p><?php echo$naamVeranderingResponse; ?></p>
                                                <p class="card-text"></p>
                                                <input type="submit" name="opslaan1" value="Opslaan" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <form action="account.php" method ="POST">
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Wachtwoord wijzigen</h4>
                                                <p style="font-size:11px; color:green">Veiligheidstip: gebruik minimaal 6 karakters en 1 symbool (!@#$%^&*()_+)</p>
                                                <p>Oud wachtwoord: <br><input type=password name="oudWachtwoord"></p>
                                                <p>Nieuw wachtwoord:<br><input type=password name="nieuwWachtwoord1"></p>
                                                <p>Herhaal nieuw wachtwoord: <br><input type=password name="nieuwWachtwoord2"></p>
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
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <h4 class="card-title">Emailadres wijzigen</h4>
                                            <form action="account.php" method="POST">
                                                <p>Nieuw emailadres: <br><input type="email" name="mail1" value=""></p>
                                                <p>Herhaal nieuw emailadres: <br><input type="email" name="mail2"></p>
                                                <p>Wachtwoord verificatie: <br><input type="password" name="mailVerifyForm">
                                                <p><?php echo$mailResetResponse1; ?></p>
                                                <p><?php echo$mailResetResponse2; ?></p>
                                                <input class="btn btn-primary" type="submit" name="emailsubmit" value="Opslaan">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
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

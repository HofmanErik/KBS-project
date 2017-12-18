<?php

session_start();

$mailResetResponse1 = " ";
$mailResetResponse2 = " ";
if (isset($_POST['emailsubmit'])) {
    $mailResetResponse1 = " ";
    $mailResetResponse2 = " ";
    $mail1 = $_POST['mail1'];
    $mail2 = $_POST['mail2'];

    if ($mail1 == $mail2) {
        $newmail = $_POST['mail1'];

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
        //sql query naam opslaan in database
        $prep = $conn->prepare("update medewerker SET email = '$newmail' WHERE mnr = '$mnr'");
        $prep->execute();
        $mailResetResponse1 = "<font color='green'>* Bedankt uw wachtwoord is email adres.</font>";
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
    header("Location: ../admin/account.php?succes");
}
?>
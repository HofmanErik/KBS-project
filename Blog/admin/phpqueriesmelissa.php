<?php
// Database connectie
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// publiceren vanuit overzicht
if (isset($_POST["publiceer"])) {
    try {
        $sql = "UPDATE artikel
            SET status=1
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Offline halen vanuit overzicht
if (isset($_POST["depubliceer"])) {
    try {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// concept publiceren
if (isset($_POST["publiceer_concept"])) {
    try {
        $sql = "UPDATE artikel
            SET status=1
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: concepten.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// maak concept vanuit gepubliceerd
if (isset($_POST["concept"])) {
    try {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gepubliceerd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// verwijder uit overzicht
if (isset($_POST["verwijder"])) {
    try {
        $sql = "UPDATE artikel
            SET status=2
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// verwijder uit concepten
if (isset($_POST["verwijder_concept"])) {
    try {
        $sql = "UPDATE artikel
            SET status=2
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: concepten.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// verwijder vanuit gepubliceerd
if (isset($_POST["verwijder_gepubliceerd"])) {
    try {
        $sql = "UPDATE artikel
                SET status=2
                WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gepubliceerd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Terugzetten vanuit verwijderd
if (isset($_POST["terugzetten"])) {
    try {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: verwijderd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Definitief verwijderen
if (isset($_POST["def_verwijder"])) {
    try {
        $sql = "DELETE from artikel
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: verwijderd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// class dbconnect{
//     $servername = "localhost";
//     $username = "beheerder";
//     $password = "geheim";
//     $dbname = "db_vindbaarin";
//     public function connect(){
//         try {
//                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             } 
//             catch (PDOException $e) {
//                 echo "Connection failed: " . $e->getMessage();
//         }
//     }
// }
?> 
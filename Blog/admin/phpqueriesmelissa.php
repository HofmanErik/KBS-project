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
        $sql = "UPDATE artikel
            SET status=1
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
}

// Offline halen vanuit overzicht
if (isset($_POST["depubliceer"])) {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
}

// concept publiceren
if (isset($_POST["publiceer_concept"])) {
        $sql = "UPDATE artikel
            SET status=1
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: concepten.php");
}

// maak concept vanuit gepubliceerd
if (isset($_POST["concept"])) {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gepubliceerd.php");
}

// verwijder uit overzicht
if (isset($_POST["verwijder"])) {
        $sql = "UPDATE artikel
            SET status=2
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: overzicht.php");
}

// verwijder uit concepten
if (isset($_POST["verwijder_concept"])) {
        $sql = "UPDATE artikel
            SET status=2
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: concepten.php");
}

// verwijder vanuit gepubliceerd
if (isset($_POST["verwijder_gepubliceerd"])) {
        $sql = "UPDATE artikel
                SET status=2
                WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gepubliceerd.php");
}

// Terugzetten vanuit verwijderd
if (isset($_POST["terugzetten"])) {
        $sql = "UPDATE artikel
            SET status=0
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: verwijderd.php");
}

// Definitief verwijderen
if (isset($_POST["def_verwijder"])) {
        $sql = "DELETE from artikel
            WHERE artikelnr = :artikelnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":artikelnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: verwijderd.php");
}




// Beantwoorden van een reactie
if(isset($_POST["beantwoord"])){
    $ratingnr = $_POST["nummer"];
    $tekst = $_POST["antwoord"];

    $sql = "INSERT INTO comment (ratingnr,tekst,auteur)
            VALUES ($ratingnr,'$tekst',1)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header('location: ../goedgekeurd.php');
}
// Medewerker inactief maken
if (isset($_POST["inactief"])) {
        $sql = "UPDATE medewerker
                SET actief=0
                WHERE mnr = :mnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":mnr", $_POST["mnr"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gebruikeroverzicht.php");
}

// Medewerker actief maken
if (isset($_POST["actief"])) {
        $sql = "UPDATE medewerker
                SET actief=1
                WHERE mnr = :mnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":mnr", $_POST["mnr"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: gbinactief.php");
}



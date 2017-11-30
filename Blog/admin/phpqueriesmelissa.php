<!-- databaseconnectie -->
<?php
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";



// publiceren vanuit overzicht
if(isset($_POST["publiceer"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
            SET concept=1
            WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: overzicht.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}
// concept publiceren
if(isset($_POST["publiceer_concept"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
            SET concept=1
            WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: concepten.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

// maak concept vanuit gepubliceerd
if(isset($_POST["concept"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
                SET concept=0
                WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: gepubliceerd.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

// verwijder uit overzicht
if(isset($_POST["verwijder"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
            SET concept=2
            WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: overzicht.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

// verwijder uit concepten
if(isset($_POST["verwijder_concept"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
            SET concept=2
            WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: concepten.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

// verwijder vanuit gepubliceerd
if(isset($_POST["verwijder_gepubliceerd"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
                SET concept=2
                WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: gepubliceerd.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}

// Terugzetten
if(isset($_POST["terugzetten"])){
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE artikel
            SET concept=0
            WHERE artikelnr = :artikelnr";

    $stmt = $conn->prepare($sql);

    $stmt -> bindvalue( ":artikelnr",$_POST["nummer"],PDO::PARAM_STR );

    $stmt->execute();

    header("location: verwijderd.php");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
}
?> 
<?php
include("dbconnect.php");
session_start();
if (isset($_POST["verwerk"])) {
    try {
        $sql = "UPDATE rating
                SET status=1
                WHERE ratingnr = :ratingnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":ratingnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: ../reacties.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if (isset($_POST["verwijder"])) {
    try {
        $sql = "DELETE from rating
            WHERE ratingnr = :ratingnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":ratingnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: ../reacties.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if (isset($_POST["verwijdergoedgekeurd"])) {
    try {
        $sql = "DELETE from rating
            WHERE ratingnr = :ratingnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":ratingnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: ../goedgekeurd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if (isset($_POST["verwijdergoedgekeurd"])) {
    try {
        $sql = "DELETE from rating
            WHERE ratingnr = :ratingnr";

        $stmt = $conn->prepare($sql);
        $stmt->bindvalue(":ratingnr", $_POST["nummer"], PDO::PARAM_STR);
        $stmt->execute();

        header("location: ../goedgekeurd.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// sql voor toevoegen comment
if (isset($_POST['submit'])) {
    try {

        $mnr = $_SESSION['mnr'];
        $nummer = $_POST["nummer"];
        $bericht = $_POST["bericht"];
                       
        $sql = "INSERT INTO comment(ratingnr,tekst,mnr,datum)
                VALUES ('$nummer','$bericht','$mnr',NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        header("location: ../reacties.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>

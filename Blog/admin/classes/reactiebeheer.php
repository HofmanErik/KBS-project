<?php
include("dbconnect.php");

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

?>
<?php

require 'classes/dbconnect.php';
// Aanroepen van de databaseclass als een variabele
$database = new Database;


if (isset($_POST["publiceer"])) {
    try {
        $query = "UPDATE rating
            SET status=1
            WHERE reviewnr = :reviewnr";

        $stmt = $conn->prepare($query);
        $stmt->bindvalue(":reviewnr", PDO::PARAM_STR);
        $stmt->execute();

        header("location: ../reacties.php");
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>
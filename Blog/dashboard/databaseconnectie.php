<?php
$servername = "localhost";
$username = "hoi";
$password = "hoi";
$dbname = "plantlust";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM plant");
    $stmt->execute();

    // set the resulting array to associative

}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 


?> 
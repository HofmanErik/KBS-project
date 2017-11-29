<!-- databaseconnectie -->
<?php
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM artikel a join medewerker m on m.mnr=a.auteur order by datum desc");
    $stmt->execute();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Update querie

// if (isset($_POST["publiceer"])) {
//     try {
//         $stmt = $conn->prepare("UPDATE artikel SET concept=1 where artikelnr = $row[artikelnr]");
//         $stmt->execute();
//     } catch (PDOException $e) {
//         echo "Connection failed: " . $e->getMessage();
//     }
// }

// Delete querie
if (isset($_POST["gepubliceerd"]) && isset($_POST["opslaan"])) {
    try {
        $stmt = $conn->prepare("UPDATE artikel SET concept=2 where artikelnr = $row[artikelnr]");
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?> 
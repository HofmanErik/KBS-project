<?php

//Include databaseconnectie
include("dbconnect.php");
 
//Id oproepen uit post data
// $id = $_POST['reviewnr'];
 
//Delete row uit tabel
// $sql = "DELETE FROM rating WHERE reviewnr=:reviewnr";
// $query = $conn->prepare($sql);
// $query->execute(array(':reviewnr' => $reviewnr));
 
//Redirect naar reactiepagina
header("Location:../reacties.php");
?>

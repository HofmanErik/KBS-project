<?php

//Include databaseconnectie
include("config.php");
 
//Id oproepen uit post data
// $reviewnr = $_POST['reviewnr'];
 
//Update row uit tabel
// $sql = "UPDATE users SET status=:1, WHERE reviewnr=:reviewnr";
// $query = $conn->prepare($sql);
// $query->execute(array(':reviewnr' => $reviewnr));
 
//Redirect naar reactiepagina
header("Location:../reacties.php");
?>

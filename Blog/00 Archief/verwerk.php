<?php
session_start();
if(isset($_POST["email"]) && $_POST["email"] == "hoi" &&
     isset($_POST["email"]) && $_POST["email"] == "hoi"){
    $_SESSION["ingelogd"] = "true";
    $_SESSION["email"] = $_POST["email"];
} else {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Controleer formulier</title>
  </head>
  <body>
  	<?php
		print("Ingelogd als ".$_POST["email"]);
  	?>
  	<br>
  	<a href="scherm.php">Ga verder...</a>
  </body>
</html>
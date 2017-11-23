<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>




       <form action="blabla.php" method="$_GET" >

           <input type="number" name="Nr" value="">
            <input type="text" name="Naam" value="">
            <input type="text" name="Woonplaats" value="">
            <input type="submit" name="Toevoegen" value="Toevoegen">


       </form>

       <?php
        $db="mysql:host=localhost:8080;dbname=winkel;port=3306";
        $user="hoi";
        $pass="hoi";
        $pdo= new PDO($db, $user, $pass);

       $stmt=$pdo->prepare("SELECT * FROM klant");
        $stmt->execute();


      print("<table><tr>" . "<th>Nr</th><th>Naam</th><th>Woonplaats</th></tr>");

    While($row=$stmt->fetch()){
            print("<tr>");
                $nr=$row["Nr"];
        $naam=$row["Naam"];
                $woonplaats = $row["Woonplaats"];
                Print("<td>" . $nr . "</td>" . "<td>" . $naam . "</td>" . "<td>" . $woonplaats . "</td>");
            print("</tr>");
        }
        print("</table>");

        if(isset($_GET["Toevoegen"])){
            $sql = "INSERT INTO klant (nummer, naam, woonplaats) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array ($_GET ["Nr"], $_GET["Naam"], $_GET["Woonplaats"]));

       }

     ?>
    </body>
</html>
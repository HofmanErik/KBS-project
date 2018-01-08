<?php
if (!isset($_POST['nummer']) && !isset($_GET['nr'])) {
    header('location: reacties.php');
} else {
    ?>

    <?php
    include '../admin/header.php';
    require 'classes/dbconnect.php';
    ?>

    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <?php
    if (isset($_POST['nummer'])) {
        $ratingnr = $_POST['nummer'];
    }
    if (isset($_GET['nr'])) {
        $ratingnr = $_GET['nr'];
    }


    $sql = "SELECT *
              FROM rating r
              JOIN bezoeker b
              ON r.bezoekernr = b.bezoekernr
              WHERE ratingnr = :ratingnr"
    ;

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':ratingnr', $ratingnr, PDO::PARAM_INT);
    $stmt->execute();
    ?>

    <!-- Content website -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../admin/dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Reacties</li>
            </ol>
            <div class="row">
                <div class="col-12">
                    <h1><i class="fa fa-commenting"></i>
                        <span class="">Reactie beantwoorden</span>
                    </h1>
                </div>
            </div>
            <br>
            <div class="container text">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mx-auto">

                        <!-- Dit print de rating en haalt op uit de database-->
    <?php
    while ($row = $stmt->fetch()) {
        $voornaam = $row["voornaam"];
        $achternaam = $row["achternaam"];
        $datum = $row["datum"];
        $tekst = $row["reactie"];
        $rating = $row["sterwaarde"];

        echo('

                    <p>
                    <img alt="" src="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=40&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=80&amp;d=mm&amp;r=g 2x" class="img-circle" height="40" width="40"> <b>' . ucfirst($voornaam) . " " . ucfirst($achternaam) . '</b><br>
                    <i>' . $datum . '</i>');
// starrating vanuit database
        for ($i = 1; $i <= $rating; $i++) {
            echo ' <span class="fa fa-star"></span>';
        }
        if (strpos($rating, '.')) {
            echo ' <span class="fa fa-star-half-o"></span>';
            $i++;
        }
        while ($i <= 5) {
            echo ' <span class="fa fa-star-o"></span>';
            $i++;
        }
    }
    echo('<br>
                    ' . $tekst . '</p>')
    ?>

                        <!-- Dit print de comment en haalt het uit de database-->
    <?php
    $sql = "SELECT *
        FROM comment c
        JOIN medewerker m
        ON c.mnr = m.mnr
        WHERE c.ratingnr = :ratingnr";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':ratingnr', $ratingnr, PDO::PARAM_INT);
    $stmt->execute();

    While ($row = $stmt->fetch()) {
        $datum = $row['datum'];
        $voornaam = $row['voornaam'];
        $achternaam = $row['achternaam'];
        $tekst = $row["tekst"];
        $commentnr = $row["commentnr"];

        echo('
            <form action="../reactieverwerk.php" method="POST">
           <p class="text-right"><img alt="" src="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=40&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/5b010e428ae638107d31537cecf25744?s=80&amp;d=mm&amp;r=g 2x" class="img-circle" height="40" width="40">
            <b>' . $voornaam . " " . $achternaam . '</b><br>
              <i>' . $datum . '</i><br>
              <input type="hidden" name="commentnr" value="'.$commentnr.'">
              <input type="hidden" name="ratingnr" value="'.$ratingnr.'">
              ' . $tekst . ' 
              <button class="btn btn-danger" type="submit" name="verwijdercomment"><span class="fa fa-trash"></span></button>
              </p></form>

              ');
    }
    ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 mx-auto">
                        <form method="POST" action="../reactieverwerk.php">
                            <input type=hidden name="ratingnr" value="<?php echo $ratingnr; ?>">
    <?php
    if (isset($_GET['plaatsen'])) {
        if ($_GET['plaatsen'] == "succes") {
            print("<font color='green'>* Reactie is verzonden! </font>");
        }
    }
    ?>
                            <p>
                                <textarea id="comment" name="reactie" cols="58" rows="8" maxlength="65525">Typ hier je reactie</textarea>
                            </p>
                            <p>
                                <input type="submit" class="btn btn-primary" name="submitantwoord" value="Reactie plaatsen"> 
                                <button class="btn btn-primary" formaction="reacties.php">Terug</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



<?php }include 'footer.php'; ?>

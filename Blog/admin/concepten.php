<?php include 'phpqueriesmelissa.php' ?>
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php include '../admin/header.php'; ?>

<?php
// Tabel oproepen
if(isset($_POST["zoektext"]) && isset($_POST["zoeken"])){
    $zoektext = $_POST["zoektext"];   
        $sql = "SELECT *
            FROM artikel a
            join medewerker m on m.mnr=a.auteur
            WHERE (status=:concept2)
            AND titel LIKE ('%".$zoektext."%')
            order by datum desc";

    $stmt = $conn->prepare($sql);
    $stmt -> bindvalue( ":concept2",0,PDO::PARAM_STR );
    $stmt -> execute();
} else {
    $sql = "SELECT * 
            FROM artikel a 
            join medewerker m on m.mnr=a.auteur 
            WHERE status = :concept;
            order by datum desc";
            
    $stmt = $conn->prepare($sql);
    $stmt -> bindvalue( ":concept",0,PDO::PARAM_STR );
    $stmt->execute();
}
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../admin/dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overzicht</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <h1><i class="fa fa-pencil"></i>
                    <span class="">Concepten</span><h1>
                        </div>
                        </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="../admin/overzicht.php"> Alles</a> |
                                <a href="../admin/gepubliceerd.php"> Gepubliceerd</a> |
                                <a href="../admin/concepten.php"> Concepten</a> |
                                <a href="../admin/verwijderd.php"> Verwijderd</a> |
                                <a href="../admin/toevoegen.php"> Toevoegen</a>
                                <form method="POST" action="concepten.php" class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="zoektext" placeholder="Zoeken...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit" name="zoeken">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Artikelnr</th>
                                                <th>Titel</th>
                                                <th>Geschreven door</th>
                                                <th>Publiceerdatum</th>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<!-- Tabel weergeven -->
<?php
while ($row = $stmt->fetch()) {
    print(" <tr>
                <form method=\"post\" action=\"phpqueriesmelissa.php\">
                    <td>" . $row['artikelnr'] . "</td>
                    <td><a href=\"#\">" . $row['titel'] . "</a></td>
                    <td>" . $row['voornaam'] . "</td>
                    <td>" . $row['datum'] . "</td>
                    <td>
                        <input type=\"submit\" class=\"btn btn-light\" name=\"publiceer_concept\" value=\"Publiceer\"></td>
                        <input type=\"hidden\" name=\"nummer\" value=\"".$row['artikelnr']."\">
                    <td>
                        <button type=\"submit\" class=\"btn btn-light\" name=\"bewerk\" value=\"bewerken\" title=\"Bewerken\">
                            <i class=\"fa fa-pencil\"></i>
                        </button> 
                        <button type=\"submit\" class=\"btn btn-light\" name=\"verwijder_concept\" value=\"Verwijder\" title=\"Verwijderen\">
                            <i class=\"fa fa-trash\"></i>
                        </button>
                    </td>
                    <td>" . $row["status"] . "</td>
                </form>
            </tr>");
}
?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card-footer small text-muted">Laatst bijgewerkt 11:59 PM</div>
                        </div>
                        </div>
                        <!-- Verwijder popup -->
                        <div class="modal fade" id="verwijder-popup" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Weet je het zeker?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Klik op verwijderen om dit artikel te verwijderen</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                                        <a class="btn btn-primary" href="../admin/overzicht.php">Verwijderen</a>
                                    </div>
                                </div>
                            </div>
                        </div>



<?php include 'footer.php'; ?>

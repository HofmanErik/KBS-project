<?php include 'phpqueriesmelissa.php' ?>
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php include '../admin/header.php'; ?>

<?php
// Tabel oproepen
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * 
            FROM artikel a 
            join medewerker m on m.mnr=a.auteur 
            WHERE concept = :concept;
            order by datum desc";
            
    $stmt = $conn->prepare($sql);
    $stmt -> bindvalue( ":concept",2,PDO::PARAM_STR );
    $stmt->execute();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
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
                    <span class="">Verwijderd</span><h1>
                        </div>
                        </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="../admin/overzicht.php"> Alles</a> |
                                <a href="gepubliceerd.php"> Gepubliceerd</a> |
                                <a href="concepten.php"> Concepten</a> |
                                <a href="verwijderd.php"> Verwijderd</a> |
                                <a href="../admin/toevoegen.php"> Toevoegen</a>
                                <form class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Zoeken...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button">
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
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while ($row = $stmt->fetch()) {
    print("<form method=\"post\" action=\"phpqueriesmelissa.php\"><tr>");
    print("<td>" . $row['artikelnr'] . "</td>");
    print("<td><a href=\"#\">" . $row['Titel'] . "</a></td>");
    print("<td>" . $row['voornaam'] . "</td>");
    print("<td>" . $row['datum'] . "</td>");
    print("<input type=\"hidden\" name=\"nummer\" value=\"".$row['artikelnr']."\">");
    print("<td><input type=\"submit\" name=\"terugzetten\" value=\"Terugzetten\" title=\"Verplaatsen naar concepten\"> ");
    print("<input type=\"submit\" name=\"def_verwijder\" value=\"Verwijder\" title=\"Definitief verwijderen\"></td>");
    print("<td>" . $row["concept"] . "</td>");
    print("</tr></form>");
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
                        <div class="modal fade" id="defverwijder-popup" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Weet je het zeker?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Klik op verwijderen om dit artikel definitief te verwijderen</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                                        <a class="btn btn-primary" href="../admin/verwijderd.php">Verwijderen</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Terug zetten popup -->
                        <div class="modal fade" id="terugzetten-popup" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Weet je het zeker?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Klik op opslaan om dit artikel te verplaatsen naar concepten</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                                        <a class="btn btn-primary" href="../admin/verwijderd.php">Opslaan</a>
                                    </div>
                                </div>
                            </div>
                        </div>



<?php include 'footer.php'; ?>

<?php include 'header.php'; ?>
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- Databaseconnectie -->
<?php
$servername = "localhost";
$username = "beheerder";
$password = "geheim";
$dbname = "db_vindbaarin";
$sql = "SELECT * FROM artikel a join medewerker m on m.mnr=a.auteur where concept=1 order by datum desc";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);
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
                    <span class="">Gepubliceerd</span><h1>
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
                                                <th>Titel</th>
                                                <th>Geschreven door</th>
                                                <th>Publiceerdatum</th>
                                                <th>Gepubliceerd</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
while ($row = $stmt->fetch()) {
    print("<tr>");
    print("<td><a href=\"#\">" . $row["Titel"] . "</a></td>");
    print("<td>" . $row["voornaam"] . "</td>");
    print("<td>" . $row["datum"] . "</td>");
    print("<td>
                           <label class=\"switch\" data-toggle=\"tooltip\" title=\"Publiceren\">

                           <input type=\"checkbox\"><span class=\"slider round\"></span></label>
                           </td>");

    print("<td>
                           <a href=\"#\" class=\"fa fa-trash\" data-toggle=\"modal\"
                            data-toggle=\"tooltip\" \"modaltooltip\" data-target=\"#verwijder-popup\"
                            title=\"Verwijderen\">
                            </a>

                            <a href=\"#\" class=\"fa fa-pencil\" data-toggle=\"tooltip\"
                            data-placement=\"right\" title=\"Bewerken\">
                            </a>
                            </td>");
    print("</tr>");
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

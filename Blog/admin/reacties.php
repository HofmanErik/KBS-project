<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php
// Include bestanden
include '../admin/header.php';
require 'classes/functions.php';

$database = new Database;

$database->query('SELECT * FROM bezoeker');
// Aanroepen van de databaseclass als een variabele
$database = new Database;

// query toevoegen aan de query functie zodat deze gereturned kan worden
$database->query('SELECT * FROM rating r JOIN bezoeker b ON r.reviewnr = b.reviewnr');
// To do - aanpassen van query om niet medewerkers maar ratings te tonen. 'SELECT * FROM rating r JOIN bezoeker b ON r.reviewnr = b.reviewnr'
$rows = $database->resultset();
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
                <span class="">Reacties</span><h1>      
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <a href="../admin/reacties.php"> Alles</a> |
                <a href="#"> Goedgekeurd</a> |
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
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Reactienr</th>
                            <th>Rating</th>
                            <th>Geschreven door</th>
                            <th>Publiceerdatum</th>
                            <th>#</th>
                            <th>#</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Geef waardes mee in de tabel -->
                    <?php foreach($rows as $row) : ?>
                    <!-- echo elke rij in de tabel met de juiste gegevens in een html table per row -->
                    <tr>
                        <td><?php echo $row['reviewnr']; ?></td>
                        <td><?php echo $row['voornaam'], $row['achternaam']; ?></td>
                        <td><?php echo '07-12-2017' ; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo '<button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>' ?></td>
                        <td><?php echo '<button type="button" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>' ?></td>
                        <td><?php echo 'Gepubliceerd' ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- Footer -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Laatst bijgewerkt 11:59 PM</div>
    </div>
</div>

<?php include 'footer.php'; ?>
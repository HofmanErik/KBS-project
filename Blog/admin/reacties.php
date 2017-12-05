<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php
// Include bestanden
include '../admin/header.php';
require 'classes/database.php';

$database = new Database;

$database->query('SELECT * FROM rating');
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
<!-- Tabel -->
                                        <?php foreach($rows as $row) : ?>
                                            <tr>
                                                <td><?php echo $row['reactienr']; ?></td>
                                                <td><?php echo $row['rating']; ?></td>
                                                <td><?php echo $row['rating']; ?></td>
                                                <td><?php echo $row['rating']; ?></td>
                                                <td><?php echo '<button type="button" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i></button>' ?></td>
                                                <td><?php echo '<button type="button" class="btn btn-danger">http://fontawesome.io/icon/window-close/</button>' ?></td>
                                                <td><?php echo "Gepubliceerd" ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                            <tr>
                                                <td><?php echo 'Test' ?></td>
                                                <td><?php echo 'Test' ?></td>
                                                <td><?php echo 'Test' ?></td>
                                                <td><?php echo 'Test' ?></td>
                                                <td><?php echo '<button type="button" class="btn btn-success"><i class="fa fa-upload" aria-hidden="true"></i></button>' ?></td>
                                                <td><?php echo '<button type="button" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></button>' ?></td>
                                                <td><?php echo "Gepubliceerd" ?></td>
                                            </tr>
<!-- Footer -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer small text-muted">Laatst bijgewerkt 11:59 PM</div>
                            </div>
                          </div>
                        </div>

<?php include 'footer.php'; ?>
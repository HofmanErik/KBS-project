<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php

// Include bestanden
include '../admin/header.php';
require 'classes/dbconnect.php';

$sql = "SELECT * FROM rating r
        JOIN artikel a on r.artikelnr = a.artikelnr
        JOIN bezoeker b on r.bezoekernr = b.bezoekernr
        WHERE r.status = 1
        ORDER BY r.datum desc";

        $stmt = $conn->prepare($sql);
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
              <span class="">Reacties</span>
          </h1>
        </div>
      </div>
        <div class="card mb-3">
          <div class="card-header">
            <a href="../admin/reacties.php">Nieuw</a> |
            <a href="goedgekeurd.php"> Goedgekeurd</a> |
          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Geschreven door</th>
                            <th>Datum</th>
                            <th>Email</th>
                            <th>Opties</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            echo '<tr>
                                    <form method="post" action="classes/reactiebeheer.php">
                                      <td>'.$row['titel'].'</td>
                                      <td>';
// starrating vanuit database
                      for($i=1;$i<=$row["sterwaarde"];$i++) {
                          echo ' <span class="fa fa-star"></span>';
                      }
                      if (strpos($row["sterwaarde"],'.')) {
                          echo ' <span class="fa fa-star-half-o"></span>';
                          $i++;
                      }
                      while ($i<=5) {
                          echo ' <span class="fa fa-star-o"></span>';
                          $i++;
                      }
                                    echo '
                                      </td>
                                      <td>'.$row['reactie'].'</td>
                                      <td>'.$row['voornaam'].' '.$row['achternaam'].'</td>
                                      <td>'.$row['datum'].'</td>
                                      <td>'.$row['email'].'</td>
                                      <input type="hidden" name="nummer" value="'.$row['ratingnr'].'">
                                      <td>
                                        <button type="submit" class="btn btn-primary" name="beantwoord" title="Beantwoorden"> <i class="fa fa-reply" aria-hidden="true"></i>
                                        </button>
                                        <button type="submit" class="btn btn-danger" name="verwijdergoedgekeurd" value="Verwijder" title="Verwijderen" onclick="return myFunctionVerwijderR()"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                      </td>
                                    </form>
                                  </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<div class="card-footer small text-muted"><?php echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?></div>
  </div>
</div>

<?php include 'footer.php'; ?>

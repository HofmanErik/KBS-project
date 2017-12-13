<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
<?php

// Include bestanden
include '../admin/header.php';
require 'classes/dbconnect.php';

    $sql = "SELECT * FROM rating r
            JOIN artikel a on r.artikelnr = a.artikelnr
            JOIN bezoeker b on r.bezoekernr = b.bezoekernr
            WHERE r.status = 0
            ORDER BY r.datum DESC";

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
            <a href="../admin/goedgekeurd.php"> Goedgekeurd</a> |
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
                            <!-- <th>Publiceerdatum</th> -->
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {         
                            echo "<tr>";
                                echo "<form method='post' action='classes/reactiebeheer.php'>";
                                    echo "<td>".$row['titel']."</td><td>";
// starrating vanuit database
                      for($i=1;$i<=$row["rating"];$i++) {
                          echo ' <span class="fa fa-star"></span>';
                      }
                      if (strpos($row["rating"],'.')) {
                          echo ' <span class="fa fa-star-half-o"></span>';
                          $i++;
                      }
                      while ($i<=5) {
                          echo ' <span class="fa fa-star-o"></span>';
                          $i++;
                      }
//
                                    echo "</td><td>".$row['comment']."</td>";
                                    echo "<td>".$row['voornaam']." ".$row['achternaam']."</td>";
                                    echo "<td>".$row['datum']."</td>";
                                    // echo "<td>".$row['datum']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<input type=\"hidden\" name=\"nummer\" value=\"".$row['ratingnr']."\">";
                                    echo "<td><button type='submit' class='btn btn-success' name='verwerk' value='Publiceer' title='Publiceren'><i class='fa fa-check' aria-hidden='true'></i></button></td> ";
                                    echo "<td><button type='submit' class='btn btn-danger' name='verwijder' value='Verwijder' title='Verwijderen'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                                echo "</form>";  
                            echo "</tr>";    
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Laatst bijgewerkt 11:59 PM</div>
  </div>
</div>

<?php include 'footer.php'; ?>

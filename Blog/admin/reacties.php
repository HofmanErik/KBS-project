<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<?php

// Include bestanden
include '../admin/header.php';
require 'classes/dbconnect.php';

try {
    $sql = "SELECT * FROM rating r
            JOIN artikel a on r.artikelnr = a.artikelnr
            JOIN bezoeker b on r.bezoekernr = b.bezoekernr";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo -"Connection failed: " . $e->getMessage();
    }
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
                            <th>Email</th>
                            <!-- <th>Publiceerdatum</th> -->
                            <th>Status</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {         
                            echo "<tr>";
                                echo "<form method='post' action='classes/reactiebeheer.php'>";
                                    echo "<td>".$row['ratingnr']."</td>";
                                    echo "<td>".$row['rating']."</td>";
                                    echo "<td>".$row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    // echo "<td>".$row['datum']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo "<input type=\"hidden\" name=\"nummer\" value=\"".$row['ratingnr']."\">";    
                                    echo "<td><button type='submit' class='btn btn-success' name='publiceer' value='Publiceer' title='Publiceren'><i class='fa fa-check' aria-hidden='true'></i></button></td>";
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

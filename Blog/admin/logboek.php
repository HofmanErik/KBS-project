<?php

// Include bestanden
include '../admin/header.php';
require 'classes/dbconnect.php';
?>

<?php
$sql = 'SELECT *
        FROM logboek l
        JOIN medewerker m
        ON l.mnr=m.mnr
        ORDER BY l.datum';

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
      <li class="breadcrumb-item active">Logboek</li>
    </ol>
      <div class="row">
        <div class="col-12">
          <h1><i class="fa fa-address-book-o"></i>
              <span class="">Logboek</span>
          </h1>
        </div>
      </div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Medewerkernr</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Logindatum</th>
                        </tr>
                    </thead>
                    <tbody>
                        

<?php
While($row=$stmt->fetch()){
  $mnr=$row['mnr'];
  $voornaam=$row['voornaam'];
  $achternaam=$row['achternaam'];
  $logindatum=$row['datum'];
echo'
                      <tr>
                        <td>'.$mnr.'</td>
                        <td>'.$voornaam.'</td>
                        <td>'.$achternaam.'</td>
                        <td>'.$logindatum.'</td>
                      </tr>';
                      }  
                      ?>                    
                    </tbody>
                </table>
            </div>
        </div>
</div>
<?php include 'footer.php'; ?>
</div>

      
<link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
<?php

// Include bestanden
include '../admin/header.php';
require 'classes/dbconnect.php';

try {
    $sql = "SELECT * FROM rating r
            JOIN artikel a on r.artikelnr = a.artikelnr
            JOIN bezoeker b on r.bezoekernr = b.bezoekernr
            WHERE r.status = 0
            ORDER BY r.datum desc";

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
            <a href="../admin/reacties.php">Nieuw</a> |
            <a href="../admin/goedgekeurd.php"> Goedgekeurd</a> |
          </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
              <script>
                function myFunctionVerwijderR(){
                  var r=confirm('Weet u zeker dat u de reactie wilt verwijderen?');
                  if(r == true){
                    return true;
                  }else{
                    return false;
                  }
                }
              </script>
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
                            <!-- <th>Publiceerdatum</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $stmt->fetch()) {
                            echo '<tr>
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
                                      <form method="post" action="classes/reactiebeheer.php">
                                      <input type="hidden" name="nummer" value="'.$row['ratingnr'].'">
                                      <td>
                                        <button type="submit" class="btn btn-success" name="verwerk" value="Publiceer" title="Goedkeuren" onclick="return myFunctionPubliceerR()">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-reply" aria-hidden="true"></i></button>
                                        <button type="submit" class="btn btn-danger" name="verwijder" value="Verwijder" title="Verwijderen" onclick="return myFunctionVerwijderR()"><i class="fa fa-trash" aria-hidden="true"></i>
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
  </div>
  <div class="card-footer small text-muted"><?php echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?></div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nieuw bericht</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="classes/reactiebeheer.php">
          <div class="form-group">
            <label for="message-text" class="form-control-label">Bericht:</label>
            <textarea class="form-control" id="message-text" name="bericht"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
        <button type="submit" class="btn btn-primary" name="submit">Verstuur</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>

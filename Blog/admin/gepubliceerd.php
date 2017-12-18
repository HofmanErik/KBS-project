<?php include 'phpqueriesmelissa.php' ?>
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php include '../admin/header.php'; ?>
<?php
  if($_SESSION['functie'] != 0 || $_SESSION['functie'] != 1) {
    header("location: ../admin/dashboard.php");
}  
?> 
<?php
  // Tabel oproepen
  if(isset($_POST["zoektext"]) && isset($_POST["zoeken"])){
    $zoektext = $_POST["zoektext"];
      $sql = "SELECT *
              FROM artikel a
              JOIN medewerker m ON a.mnr=m.mnr
              WHERE (status=:concept2)
              AND titel LIKE ('%".$zoektext."%')
              ORDER BY datum DESC";

              $stmt = $conn->prepare($sql);
              $stmt -> bindvalue( ":concept2",1,PDO::PARAM_STR );
              $stmt -> execute();
  }else{
    $sql = "SELECT *
            FROM artikel a
            JOIN medewerker m ON a.mnr=m.mnr
            WHERE status = :concept;
            ORDER BY datum DESC";

            $stmt = $conn->prepare($sql);
            $stmt -> bindvalue( ":concept",1,PDO::PARAM_STR );
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
          <span class="">Gepubliceerd</span>
        </h1>
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
      <form method="POST" action="gepubliceerd.php" class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
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
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = $stmt->fetch()) {
                print('
                      <tr>
                        <form method="post" action="phpqueriesmelissa.php">
                                <td>'.$row['artikelnr'].'</td>
                                <td><a href="#">'.$row['titel'].'</a></td>
                                <td>'.$row['voornaam'].'</td>
                                <td>'.$row['datum'].'</td>
                                <td>
                                <script>
                                  function myFunctionConcept(){
                                    var r=confirm("Weet u zeker dat u het artikel wilt verplaatsen naar concept?");
                                    if(r == true){
                                      return true;
                                    }else{
                                      return false;
                                    }
                                  }
                                </script>
                                <input type="submit" class="btn btn-secondary" name="concept" value="Concept" onclick="return myFunctionConcept()"></input></td>
                                  <input type="hidden" name="nummer" value="'.$row['artikelnr'].'"<input>
                                <td>
                                  <button type="submit" class="btn btn-secondary" name="bewerk" value="bewerken" formaction="artikelbewerk.php" title="Bewerken"><i class="fa fa-pencil"></i>
                                  </button>

                                  <script>
                                    function myFunctionVerwijder_gepubliceerd(){
                                      var r=confirm("Weet u zeker dat u het artikel wilt verwijderen?");
                                      if(r == true){
                                        return true;
                                      }else{
                                        return false;
                                      }
                                    }
                                  </script>
                                  <button type="submit" class="btn btn-secondary" name="verwijder_gepubliceerd" value="Verwijder" title="Verwijderen" onclick="return myFunctionVerwijder_gepubliceerd()"><i class="fa fa-trash"></i>
                                  </button>
                                </td>
                        </form>
                      </tr>');
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

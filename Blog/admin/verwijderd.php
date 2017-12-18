<?php include 'phpqueriesmelissa.php' ?>
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php include '../admin/header.php'; ?>

<?php
  if($_SESSION['functie'] == 2) {
    header("location: ../admin/dashboard.php");
}
?>

<?php
  // Tabel oproepen
  if(isset($_POST["zoektext"]) && isset($_POST["zoeken"])){
    $zoektext = $_POST["zoektext"];
      $sql = "SELECT *
              FROM artikel a
              JOIN medewerker m ON m.mnr=a.mnr
              WHERE (status=:concept2)
              AND titel LIKE ('%".$zoektext."%')
              ORDER BY datum DESC";

              $stmt = $conn->prepare($sql);
              $stmt -> bindvalue( ":concept2",2,PDO::PARAM_STR );
              $stmt -> execute();
  }else{
      $sql = "SELECT *
              FROM artikel a
              JOIN medewerker m ON m.mnr=a.mnr
              WHERE status = :concept;
              ORDER BY datum DESC";

              $stmt = $conn->prepare($sql);
              $stmt -> bindvalue( ":concept",2,PDO::PARAM_STR );
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
            <span class="">Verwijderd</span>
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
        <form method="POST" action="verwijderd.php" class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
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
              </tr>
            </thead>
            <tbody>
              <?php
                while ($row = $stmt->fetch()) {
                  print('
                      <tr>
                        <form method="post" action="phpqueriesmelissa.php"><tr>
                          <td>'.$row['artikelnr'].'</td>
                          <td><a href="#">'.$row['titel'].'</a></td>
                          <td>'.$row['voornaam'].'</td>
                          <td>'.$row['datum'].'
                            <input type="hidden" name="nummer" value="'.$row['artikelnr'].'"></td>
                          <td>
                          <script>
                            function myFunctionTerugzetten_concept(){
                              var r=confirm("Weet u zeker dat u het artikel wilt terugzetten naar concept?");
                              if(r == true){
                                return true;
                              }else{
                                return false;
                              }
                            }
                          </script>
                            <button type="submit" class="btn btn-secondary" name="terugzetten" value="Terugzetten" title="Verplaatsen naar concepten" onclick="return myFunctionTerugzetten_concept()">
                                <i class="fa fa-undo"></i>
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

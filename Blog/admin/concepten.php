<?php include 'phpqueriesmelissa.php';
      include '../admin/header.php'; ?>
<?php

//Checkt of je bevoegd bent de pagina te bezoeken
  if($_SESSION['functie'] == 2) {
    header("location: ../admin/dashboard.php");
}
?>
<?php
  // Tabel oproepen, zoekfunctie op titel
  if(isset($_POST["zoektext"]) && isset($_POST["zoeken"])){
    $zoektext = $_POST["zoektext"];
        $sql = "SELECT *
                FROM artikel a
                JOIN medewerker m on m.mnr=a.mnr
                WHERE (status=:concept2)
                AND titel LIKE ('%".$zoektext."%')
                ORDER BY datum DESC";

                $stmt = $conn->prepare($sql);
                $stmt -> bindvalue( ":concept2",0,PDO::PARAM_STR );
                $stmt -> execute();
  }else{
    //alle artikelen ophalen
        $sql = "SELECT *
                FROM artikel a
                join medewerker m on m.mnr=a.mnr
                WHERE status = :concept;
                order by datum desc";

                $stmt = $conn->prepare($sql);
                $stmt -> bindvalue( ":concept",0,PDO::PARAM_STR );
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
                <h1><i class="fa fa-file-o"></i>
                    <span class="">Concepten</span><h1>
            </div>
        </div>
    </div>
        <div class="card mb-3">
            <div class="card-header">
                <a href="../admin/overzicht.php"> Alles</a> |
                <a href="../admin/gepubliceerd.php"> Gepubliceerd</a> |
                <a href="../admin/concepten.php"> Concepten</a> |
                <a href="../admin/verwijderd.php"> Verwijderd</a> |
                <a href="../admin/toevoegen.php"> Toevoegen</a>
                <!--Formulier zoekfunctie-->
                <form method="POST" action="concepten.php" class="form-inline my-2 my-lg-0 mr-lg-2 float-right">
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
            <!--Tabelgegevens artikel-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Artikelnr</th>
                                    <th>Titel</th>
                                    <th>Geschreven door</th>
                                    <th>Publiceerdatum</th>
                                    <th>Actie</th>
                                    <th>Opties</th>
                                </tr>
                            </thead>
                            <tbody>
                              <!-- Tabel, buttons, pop-up weergeven -->
                                <?php
                                    while ($row = $stmt->fetch()) {
                                        print('
                                            <tr>
                                                <form method="post" action="phpqueriesmelissa.php">
                                                    <td>'.$row['artikelnr'].'</td>
                                                    <td>'.$row['titel'].'</td>
                                                    <td>'.$row['voornaam'].'</td>
                                                    <td>'.$row['datum'].'</td>
                                                    <td>

                                                    <script>
                                                      function myFunctionPubliceer_concept(){
                                                        var r=confirm("Weet u zeker dat u het artikel wilt publiceren?");
                                                        if(r == true){
                                                          return true;
                                                        }else{
                                                          return false;
                                                        }
                                                      }
                                                    </script>

                                                    <input type="submit" class="btn btn-secondary" name="publiceer_concept" value="Publiceer" onclick="return myFunctionPubliceer_concept()"></td>
                                                        <input type="hidden" name="nummer" value="'.$row['artikelnr'].'">
                                                    <td>
                                                        <button type="submit" class="btn btn-secondary" name="bewerk" value="bewerken" formaction="artikelbewerk.php" title="Bewerken"><i class="fa fa-pencil"></i>
                                                        </button>

                                                        <script>
                                                          function myFunctionVerwijder_concept(){
                                                            var r=confirm("Weet u zeker dat u het artikel wilt verwijderen?");
                                                            if(r == true){
                                                              return true;
                                                            }else{
                                                              return false;
                                                            }
                                                          }
                                                        </script>

                                                        <button type="submit" class="btn btn-secondary" name="verwijder_concept" value="Verwijder" title="Verwijderen" onclick="return myFunctionVerwijder_concept()"><i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                    <td>'.$row["status"].'</td>
                                                </form>
                                            </tr>');
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                  <?php
                  //laatst bijgewerkt (code)
                  echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
                </div>
            </div>
            </div>

<?php include 'footer.php'; ?>

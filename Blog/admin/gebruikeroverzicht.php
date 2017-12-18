<?php include 'phpqueriesmelissa.php' ?>
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php include '../admin/header.php';?>


<?php
  // Tabel oproepen
      $sql = "SELECT *
              FROM medewerker
              WHERE actief = TRUE";
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
        <li class="breadcrumb-item active">Overzicht</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1><i class="fa fa-user"></i>
            <span class="">Actieve gebruikers</span></h1>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <a href="../admin/gebruikeroverzicht.php"> Actief</a> |
          <a href="gbinactief.php"> Inactief</a> | 
          <a href="register.php"> Toevoegen</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Voornaam</th>
                  <th>Achternaam</th>
                  <th>Email</th>
                  <th>Functie</th>
                  <th>Laatst ingelogd</th>                  
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- Tabel -->
                <?php
                while ($row = $stmt->fetch()) {
                  print('
                      <form method="post" action="phpqueriesmelissa.php">
                    <tr>                      
                        <td>'.$row['voornaam'].'</td>
                        <td>'.$row["achternaam"].'</a>
                        </td>
                        <td>'.$row['email'].'</td>');
                    if($row['functie']==1){
                      print('
                        <td>Beheerder</td>');
                  } elseif($row['functie']==2) {
                      print('
                          <td>Moderator</td>');
                  } elseif($row['functie']==0) {
                      print('
                          <td>Superadmin</td>');
                    } 
                      print('
                        <td></td>
                        <td>
                          <label>
                            <script>
                              function myFunctionPubliceren(){
                                var r=confirm("Weet u zeker dat u deze medewerker op inactief wilt zetten?");
                                if(r == true){
                                  return true;
                                }else{
                                  return false;
                                }
                              }
                              </script>
                              <button type="submit" class="btn btn-secondary" name="inactief" onclick="return myFunctionPubliceren()">Inactief</button>
                          </label>
                          <input type="hidden" name="mnr" value="'.$row['mnr'].'">
                        </td><tr></form>');
                  }
?>
<!-- Footer -->
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"><?php echo "Last modified: " . date ("F d Y H:i:s.", getlastmod()); ?></div>
      </div>
    </div>
  </div>


<?php include '../admin/footer.php'; ?>

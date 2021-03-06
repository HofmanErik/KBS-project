<?php include '../admin/header.php'; ?>


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../admin/dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
      <div class="row">
        <div class="col-12">
          <h1>
            <i class="fa fa-dashboard"></i>
            <span class="">Dashboard</span>
          </h1>
        </div>
      </div>

        <?php
        //checken voor moderator, toont moderator dashboard
        if($_SESSION['functie'] == '2') {

        ?>
        <div class="row">
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-commenting"></i>
              </div>
              <div class="mr-5">Reacties</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/reacties.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>

        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa fa-cogs"></i>
              </div>
              <div class="mr-5">Instellingen</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/account.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
      </div>
        <?php
        }
        //checken voor beheerder, toont beheerder dashboard
        if($_SESSION['functie'] == '0' || $_SESSION['functie'] == '1') {

        ?>
        <div class="row">
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Artikel overzicht</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/overzicht.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-pencil"></i>
              </div>
              <div class="mr-5">Artikel toevoegen</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/toevoegen.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-commenting"></i>
              </div>
              <div class="mr-5">Reacties</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/reacties.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa fa-cogs"></i>
              </div>
              <div class="mr-5">Instellingen</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/account.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
        <?php
        //Checken op Super-Admin, voor weergave gebruikeroverzicht
        if($_SESSION['functie'] == 0){ ?>
        <div class="col-lg-4 col-sm-4 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Gebruikers</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/gebruikeroverzicht.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-address-book-o"></i>
              </div>
              <div class="mr-5">Logboek</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../admin/logboek.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
<?php } ?>
<?php

$sql= 'SELECT *
       FROM tel';

      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $row=$stmt->fetch();
      $tel=$row['tel'];
?>

        <div class="col-lg-4 col-sm-6 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-pie-chart"></i>
              </div>
              <div class="mr-5">Bezoekersteller</div>
            </div>
              <span class="card-footer text-black clearfix small z-1" href="../index.php">
                <span class="float-left">Totaal aantal bezoekers:</span>
                <span class="float-right"><?= $tel ?></span>
              </span>
          </div>
        </div>
        


      </div>
  </div>
</div>
<?php
}

?>


<?php include '../admin/footer.php'; ?>

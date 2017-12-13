

<?php include '../admin/moderatorheader.php'; ?>

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

        <div class="col-xl-4 col-sm-6 mb-3">
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
        <div class="col-xl-4 col-sm-6 mb-3">
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

        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-black bg-secundairy o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa fa-globe "></i>
              </div>
              <div class="mr-5">Blog</div>
            </div>
              <a class="card-footer text-black clearfix small z-1" href="../index.php">
                <span class="float-left">Klik hier</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
          </div>
        </div>
      </div>
  </div>
</div>

<?php include '../admin/footer.php'; ?>

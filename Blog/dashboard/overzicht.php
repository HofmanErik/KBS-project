<?php include 'header.php'; ?>
<?php include 'footer.php'; ?>


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overzicht</li>
      </ol>
      <div class="row">
        <div class="col-12">
            <h1><i class="fa fa-pencil"></i>
            <span class="">Overzicht</span><h1>
        </div>
      </div>
    </div>
     <div class="card mb-3">
        <div class="card-header">
          <a href="overzicht.php"> Alles</a> |
          <a href="#"> Gepubliceerd</a> |
          <a href="#"> Concepten</a> |
          <a href="#"> Verwijderd</a> |
          <a href="toevoegen.php"> Toevoegen</a>
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
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th><input type="checkbox"></th>
                  <th>Titel</th>
                  <th>Geschreven door</th>
                  <th>Datum</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">Winst maken in een onderneming</a></td>
                  <td>Vindbaar-in</td>
                  <td>04-02-2017</td>
                </tr>
                  <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">5 tips voor beginnende beleggers</a></td>
                  <td>Vindbaar-in</td>
                  <td>02-02-2017</td>
                </tr>
                  <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">De opkomst van de badeend</a></td>
                  <td>Vindbaar-in</td>
                  <td>31-01-2017</td>
                </tr>
                  <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">Bitcoins voor dummies</a></td>
                  <td>Vindbaar-in</td>
                  <td>28-01-2017</td>
                </tr>
                                <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">Winst maken in een onderneming</a></td>
                  <td>Vindbaar-in</td>
                  <td>04-01-2017</td>
                </tr>
                  <tr>
                  <td><input type="checkbox"></td>
                  <td><a href="#">5 tips voor beginnende beleggers</a></td>
                  <td>Vindbaar-in</td>
                  <td>02-01-2017</td>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Laatst bijgewerkt 11:59 PM</div>
      </div>
</div>

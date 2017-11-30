<?php include "../admin/header.php" ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../admin/dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Toevoegen</li>
    </ol>
  </div>
  <div class="card-body">
    <div class="col-md-12">
    <form action="../admin/toevoegen.php" method="$_GET">
      Titel: <input type="text" name="Titel" value="">
      <input type="submit" name="Voeg toe" value="Voeg toe">
      <br/>
      <br/>
      Thumbnail: <input type="file" name="Thumbnail" accept="image/*" onchange="loadFile(event)">
      <img id="output"/>
    </div>
    <div class="tinymce">
      <br/>
          <?php
          include "../admin/editor/tinymce/index.php"
          ?>
</div>
<br/>
<div class="row-buttons">
  <div class="col-md-4">
    <form method="$_GET" action="overzicht.php">
      <input type="submit" name="Annuleren" value="Annuleren">
      <input type="submit" name="Opslaan" value="Opslaan">
      <input type="submit" name="Publiceren" value="Publiceren">
    </form>
  </div>
</div>
</form>
</div>
</div>

<?php
if(isset($_GET ["Publiceren"]))

?>


<?php include "../admin/footer.php" ?>

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
      <form action="verwerktoevoegen.php" method="POST">
    Titel:
    <input type="text" name="titel" value=""><br>
    Tekst:
    <textarea  name="tekst" value=""></textarea><br>
    <input type="submit" name="toevoegen" value="toevoegen"><br>
  </form>


    <</div>
    <div class="tinymce">
      <br/>
         <?php
         include "../admin/editor/tinymce/index.php"
         ?>
 </div>
 <!---
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
</div>-->

<?php



?>


<?php include "../admin/footer.php" ?>

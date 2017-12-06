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
      <form action="verwerkopslaan.php" method="POST">
    <strong>Titel:</strong> <br>
    <input type="text" name="titel" value="" size="138px"><br><br>
</div>

    <!--Hier staat de tekst editor tinyMCE-->
    <div class="container">
      <div class="row editor">
        <div class="col-md-8">
    <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
      <script type="text/javascript">
      tinymce.init({
        selector: '#myTextarea',
        theme: 'modern',
        width: 1000,
        height: 400,
        plugins: [
          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
          'save table contextmenu directionality emoticons template paste textcolor'
        ],
        content_css: 'css/content.css',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | print preview media fullpage | forecolor backcolor emoticons'
      });
      </script>

      <textarea id="myTextarea" name="tinymce"></textarea>

        </div>
      </div>
    </div>
    <br>

  <div class="col-md-12">
    <input type="submit" name="Opslaan" value="Opslaan"><br>
  </div>
  </form>
</div>

    <!--</div>
    <div class="tinymce">
      <br/>
         <?php
         //include "../admin/editor/tinymce/index.php"
         ?>
 </div>-->
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




<?php include "../admin/footer.php" ?>

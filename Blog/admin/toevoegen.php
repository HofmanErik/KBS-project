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
    <div class="row">
      <div class="col-md-12">
        <h1><i class="fa fa-pencil"></i>
          <span class="">Artikel toevoegen</span></h1>
      </div>
    </div>
      <div class="card text-black bg-secundairy o-hidden h-100">
        <div class="col-md-12">
          <form action="verwerktoevoegen.php" method="POST" enctype="multipart/form-data" onsubmit="myFunctionOpslaan" onsubmit="myFunctionPubliceren">
            <!-- Titel -->
            <strong>Titel:</strong> <br>
            <input type="text" name="titel" value="" size="138px" aria-required="true" required="required"><br><br>
            <!--Thumbnail-->
            <input type="file" name="thumbnail" aria-required="true" required="required">
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
            <!--Pop-up voor publiceren -->
            <script>
            function myFunctionPubliceren(){
              var r=confirm("Weet u zeker dat u het artikel wilt publiceren");
              if(r == true){
                return true;
              }else{
                return false;
              }
            }
</script>
            <input type="submit" name="Publiceren" value="Publiceren" onclick="return myFunctionPubliceren()">
            <!--Pop-up voor opslaan -->
            <script>
            function myFunctionOpslaan()
            {
            var r=confirm("Weet u zeker dat u het artikel wilt opslaan? ");
            if(r == true){
            return true;
            }else{
            return false;
            }
            }
            </script>
            <input type="submit" name="Opslaan" value="Opslaan" onclick="return myFunctionOpslaan()"><br><br>

          </div>
          </form>
    </div>
  </div>
</div>


<?php include "../admin/footer.php" ?>

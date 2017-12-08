<?php include "../admin/header.php";


  if(isset($_POST['bewerk'])){

      $servername = "localhost";
      $username = "beheerder";  
      $password = "geheim";
      $dbname = "db_vindbaarin";

      $artikelnr = $_POST['nummer'];

      try {
      //Creating connection for mysql
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      }
      catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
      //sql query naam opslaan in database
      $sql = ("SELECT * FROM artikel WHERE artikelnr = '$artikelnr'");
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 

        $row = $stmt->fetch();

          $titel    = $row['titel'];
          $tekst    = $row['tekst'];
          $thumbnail  = $row['thumbnail'];
          $auteur   = $row['auteur'];
          $datum    = $row['datum'];
          $afbeelding = $row['afbeelding'];
          $status   = $row['status'];
           


        
    //    header("location: artikelbewerk.php");


}



?>
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
      <form action="artikelbewerkopslaan.php" method="POST" enctype="multipart/form-data">
    <strong>Titel:</strong> <br>
    <input type="text" name="titel" value="<?php echo $titel; ?>" size="138px"><br><br>
<!--thumbnail-->
    <input type="file" name="thumbnail" >

    <input type="hidden" name="artikelnr" value="<?php echo $artikelnr; ?>">
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

      <textarea id="myTextarea" name="tinymce"><?php echo $tekst; ?></textarea>

        </div>
      </div>
    </div>
    <br>

  <div class="col-md-12">
    <input type="submit" name="publiceren" value="Posten">
    <input type="submit" name="concept" value="Draft">
    <!-- DOET HET NOG NIET!-->
    <!--<input type="submit" name="Opslaan" value="Opslaan"><br><br>-->
  </div>
  </form>
</div>
<?php include "../admin/footer.php" ?>
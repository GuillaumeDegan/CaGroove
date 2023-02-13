<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
  </head>

  <?php 
  
   // Connect to the database
   $con = mysqli_connect('localhost', 'root', '','cagroove');

   // Check connection
   if (!$con) {
       die("Connection failed: " . mysqli_connect_error());
   }
 
   
     $sqlHoraires = "SELECT * FROM organisation";
     $resultHoraires = mysqli_query($con, $sqlHoraires);
 
     $dataHoraires = array();
     while ($row = mysqli_fetch_assoc($resultHoraires)) {
         $dataHoraires[] = $row;
     }
 
     
     mysqli_close($con);

  ?>

  <body>
    <fieldset>
      <legend>ARTISTE</legend>
      <form name="frmContact" method="post" action="ajout_artiste.php">
        <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" />
        </p>
        <p>
          <label for="style">style</label>
          <input type="text" name="style" id="style" />
        </p>
        <p>
          <label for="horaire">horaire</label>
          <?php foreach($dataHoraires as $checkbox) : ?>
            <input name="horaires[]" value="h_<?= $checkbox['id'] ?>" type="checkbox">
            <label for="horaires[]"><?= $checkbox['horaires'] ?></label>
          <?php endforeach; ?>
        </p>
        <p>
          <label for="reseaux">reseaux sociaux</label>
          <textarea name="reseaux" id="reseaux"></textarea>
        </p>
        <p>
          <label for="nationaliter">nationaliter</label>
          <input type="text" name="nationaliter" id="nationaliter" />
        </p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>

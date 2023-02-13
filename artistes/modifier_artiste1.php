<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>


    <?php

$submit_id = $_GET['id'];
// Connect to the database
$con = mysqli_connect('localhost', 'root', '','cagroove');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all data from the table
$sql = "SELECT * FROM artiste WHERE id = $submit_id ;";
$result = mysqli_query($con, $sql);

// Fetch the data into an array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the connection
mysqli_close($con);

?>
  </head>


  <body>
  <?php foreach ($data as $row): ?>
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="modifier_artiste2.php?id=<?php echo $row['id']; ?>">
        
      <p>
          <label for="txtName">Nom </label>
          <input type="text" name="txtName" id="txtName" value="<?php echo $row['nom']; ?>" />
        </p>
        <p>
          <label for="style">style</label>
          <input type="text" name="style" id="style" value="<?php echo $row['style']; ?>" />
        </p>
        <p>
          <label for="horaire">horaire</label>
          <input type="text" name="horaire" id="horaire" value="<?php echo $row['idHoraire']; ?>" />
        </p>
        <p>
          <label for="reseaux">reseaux sociaux</label>
          <input type="text" name="reseaux" id="reseaux" value="<?php echo $row['reseauxSociaux']; ?>"></input>
        </p>
        <p>
          <label for="nationaliter">nationaliter</label>
          <input type="text" name="nationaliter" id="nationaliter" value="<?php echo $row['nationalite']; ?>"/>
        </p>
        <p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
    <?php endforeach; ?>
  </body>
</html>

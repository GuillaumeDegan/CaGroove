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
  <?php include '../header/header.php';?>
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="ajout_event.php">
        <p>
          <label for="places">Place </label>
          <input type="text" name="places" id="places" />
        </p>
        <p>
          <label for="lieu">Lieu</label>
          <input type="text" name="lieu" id="lieu" />
        </p>
        <p>
          <label for="date">Date</label>
          <input type="date" value="2017-06-01" name="date" id="date" />
        </p>
        <p>
            <?php foreach($dataHoraires as $checkbox) : ?>
              <label for="horaires[]"><?= $checkbox['horaires'] ?></label>
              <input name="horaires[]" value="h_<?= $checkbox['id'] ?>" type="checkbox">
            <?php endforeach; ?>
        </p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>

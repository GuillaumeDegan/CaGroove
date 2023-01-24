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
$sql = "SELECT * FROM event WHERE id = $submit_id ;";
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
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="ajout_event.php">
        <p>
          <label for="place"><?php echo $row['place'];?> </label>
          <input type="text" name="place" id="place" />
        </p>
        <p>
          <label for="lieu">Lieu</label>
          <input type="text" name="lieu" id="lieu" />
        </p>
        <p>
          <label for="date">Date</label>
          <input type="text" name="date" id="date" />
        </p>
        <p>

        <p>&nbsp;</p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>

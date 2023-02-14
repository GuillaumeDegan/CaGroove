<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>


    <?php
    require "../database/connectDB.php";
    $db = new ConnectDB('cagroove');

    $submit_id = $_GET['id'];

    $db->queryGET("SELECT * FROM event WHERE id = $submit_id ;")
?>
  </head>


  <body>
  <?php include '../header/header.php';?>
  <?php foreach ($data as $row): ?>
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="modifier_event2.php?id=<?php echo htmlspecialchars($row->id);?>">
        <p>
          <label for="places"> place </label>
          <input type="text" name="places" id="places" value="<?php echo htmlspecialchars($row->places);?>"/>
        </p>
        <p>
          <label for="lieu"> lieu </label>
          <input type="text" name="lieu" id="lieu" value="<?php echo htmlspecialchars($row->lieu);?>" />
        </p>
        <p>
          <label for="date">date </label>
          <input input type="date" name="date" id="date"  value="<?php echo htmlspecialchars($row->date);?>" />
        </p>
        <p>
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
    <?php endforeach; ?>
  </body>
</html>

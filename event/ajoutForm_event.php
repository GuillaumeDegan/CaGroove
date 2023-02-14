<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact Form - PHP/MySQL Demo Code</title>
  </head>

  <body>
  <?php include '../header/header.php';?>
    <fieldset>
      <legend>EVENT</legend>
      <form name="frmContact" method="post" action="ajout_event.php">
        <p>
          <label for="nom">Nom</label>
          <input type="text" name="nom" id="nom" />
        </p>
        <p>
          <label for="places">Place</label>
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
          <input type="submit" name="Submit" id="Submit" value="Submit" />
        </p>
      </form>
    </fieldset>
  </body>
</html>

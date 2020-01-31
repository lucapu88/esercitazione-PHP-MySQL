<?php
include 'function.php';
$result = recuperaStanze();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>Le stanze dell'hotel</h1>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Numero stanza</th>
                <th scope="col">Piano</th>
              </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $row['id'] ?></td>
                          <td><?php echo $row['room_number'] ?></td>
                          <td><?php echo $row['floor'] ?></td>
                        </tr>
                        <?php
              	    }
                } elseif ($result) { ?>
                        <tr>
                          <td colspan="3">Non ci sono risultati!</td>
                        </tr>
                        <?php
                } else { ?>
                        <tr>
                          <td colspan="3">Si è verificato un errore :(</td>
                        </tr>
                        <?php
                } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

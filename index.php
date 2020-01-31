<?php
include 'function.php'; //includo il file delle funzioni
$result = recuperaStanze(); //richiamo la funzione che mi recupera le stanze
include 'layout/header.php'; //includo il file dell'header
?>

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

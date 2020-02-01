<?php
include 'function.php'; //includo il file delle funzioni
$result = recuperaPrenotazioni();
$result2 = stanzeDisponibili();
include 'header.php'; //includo il file dell'header
?>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php
          if ($result && $result2 && $result->num_rows > 0 && $result2->num_rows > 0) { ?>
              <h3>Disponibile da subito:</h3>
     <?php while($row = $result2->fetch_assoc()) { ?>
              <p>NUMERO STANZA:<strong> <?php echo $row['room_number'] ?></strong></p>
            <?php
            } ?>
             <h3>Stanze prenotate:</h3>
        <?php while($row = $result->fetch_assoc()) { ?>
                <ul>
                  <li>NUMERO STANZA: <strong><?php echo $row['room_number'] ?></strong></li>
                  <li>Prenotata dal: <?php echo $row['updated_at'] ?></li>
                  <li>Fino al: <?php echo $row['updated_at'] ?></li>
                </ul>
                <?php
            }
          } elseif ($result) { ?>
                    <p>Non ci sono risultati!</p>
                  <?php
          } else { ?>
                    <p>Si è verificato un errore :(</p>
                  <?php
          } ?>
        </div>
      </div>
    </div>
  </body>
</html>

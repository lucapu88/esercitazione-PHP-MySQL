<?php
include 'function.php'; //includo il file delle funzioni
$result = recuperaStanze(); //richiamo la funzione che mi recupera le stanze
include 'header.php'; //includo il file dell'header
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
                <th scope="col">Azioni</th>
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
                          <td>
                            <a class="btn btn-info" href="dettagli_stanza.php?idStanza=<?php echo $row['id'] ?>"> <!-- al click vado a richiamare il file dei dettagli della singola stanza passandogli 'id come parametro in get -->
                              Dettagli
                            </a>
                          </td>
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

<?php
include 'function.php'; //includo il file delle funzioni
$result = recuperaDettagli_stanza($_GET['idStanza']); //richiamo la funzione passandogli l'id della stanza come parametro in get che mi è stato dato dall'href nel file index.php
include 'layout/header.php'; //includo il file dell'header
?>

    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php
          if ($result && $result->num_rows > 0) {
              // output data of each row
            $row = $result->fetch_assoc() ?>
                  <ul>
                    <li>ID: <?php echo $row['id'] ?></li>
                    <li>NUMERO STANZA: <?php echo $row['room_number'] ?></li>
                    <li>PIANO: <?php echo $row['floor'] ?></li>
                    <li>NUMERO LETTI: <?php echo $row['beds'] ?></li>
                    <li>Creata il: <?php echo $row['created_at'] ?></li>
                    <li>Modificata il: <?php echo $row['updated_at'] ?></li>
                  </ul>
                  <?php
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

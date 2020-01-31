<?php
function connetti_db() { //funzione che crea una connessione tra i dati che vengono dichiarati nelle variabili del file data.php
  include 'data.php';
  return new mysqli($servername, $username, $password, $dbname);
}

function recuperaStanze() { //funzione che tramite una query mi va a recuperare le stanze (con i relativi dati richiesti) dal nostro databese
  //connect
  $conn = connetti_db();
  // Check connection
  if (!$conn || ($conn && $conn->connect_error)) { //se non c'è connessione, oppure se c'è connessione ma ci sono errori
    if ($conn && $conn->connect_error) { //se c'è connessione ma ci sono errori
      echo ("Connection failed: " . $conn->connect_error); //stampa un messaggio contenente l'errore
    }
    return;
  }
  $sql = "SELECT id, room_number, floor FROM stanze"; //se c'è connessione, va a buon fine ed esegue la query dove dalla tabella stanze seleziona l'id della stanza, il numero della stanza, e il piano.
  $result = $conn->query($sql); //crea una variabile dove immagazzina i risultati
  $conn->close(); //chiude la connessione
  return $result; //in fine ritorna i risultati
}

function recuperaDettagli_stanza($idStanza) { //funzione che tramite una query mi va a recuperare i dettagli di ogni singola stanza dal nostro databese
  //connect
  $conn = connetti_db();
  // Check connection
  if (!$conn || ($conn && $conn->connect_error)) { //se non c'è connessione, oppure se c'è connessione ma ci sono errori
    if ($conn && $conn->connect_error) { //se c'è connessione ma ci sono errori
      echo ("Connection failed: " . $conn->connect_error); //stampa un messaggio contenente l'errore
    }
    return;
  }
  $sql = "SELECT * FROM stanze WHERE id = " . $idStanza; //se c'è connessione, va a buon fine ed esegue la query dove dalla tabella stanze seleziona tutti i dettagli della singola stanza passandogli l'id.
  $result = $conn->query($sql); //crea una variabile dove immagazzina i risultati
  $conn->close(); //chiude la connessione
  return $result; //in fine ritorna i risultati
}
 ?>

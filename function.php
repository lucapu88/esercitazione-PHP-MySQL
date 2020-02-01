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
  $sql = "SELECT id, room_number FROM stanze"; //se c'è connessione, va a buon fine ed esegue la query dove dalla tabella stanze seleziona l'id della stanza, il numero della stanza, e il piano.
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

function recuperaPrenotazioni() { //funzione che tramite una query mi va a recuperare i dettagli delle prenotazioni dal nostro databese
  //connect
  $conn = connetti_db();
  // Check connection
  if (!$conn || ($conn && $conn->connect_error)) { //se non c'è connessione, oppure se c'è connessione ma ci sono errori
    if ($conn && $conn->connect_error) { //se c'è connessione ma ci sono errori
      echo ("Connection failed: " . $conn->connect_error); //stampa un messaggio contenente l'errore
    }
    return;
  }
  $sql = "SELECT * FROM stanze LEFT JOIN prenotazioni ON stanze.id = prenotazioni.stanza_id WHERE prenotazioni.id is NOT NULL ORDER BY `stanze`.`room_number` ASC"; //se c'è connessione, va a buon fine ed esegue la query dove unisce le tabelle stanze e prenotazioni, va a prendermi tutte le stanze dove il valore non è null e ordina la tabella per numero di stanza in ordine crescente
  $result = $conn->query($sql); //crea una variabile dove immagazzina i risultati
  $conn->close(); //chiude la connessione
  return $result; //in fine ritorna i risultati
}
function stanzeDisponibili() { //funzione che tramite una query mi va a recuperare le stanze che non sono state prenotate
  //connect
  $conn = connetti_db();
  // Check connection
  if (!$conn || ($conn && $conn->connect_error)) { //se non c'è connessione, oppure se c'è connessione ma ci sono errori
    if ($conn && $conn->connect_error) { //se c'è connessione ma ci sono errori
      echo ("Connection failed: " . $conn->connect_error); //stampa un messaggio contenente l'errore
    }
    return;
  }
  $sql = "SELECT * FROM stanze LEFT JOIN prenotazioni ON stanze.id = prenotazioni.stanza_id WHERE prenotazioni.id is NULL ORDER BY `stanze`.`room_number` ASC"; //se c'è connessione, va a buon fine ed esegue la query dove unisce le tabelle stanze e prenotazioni, va a prendermi tutte le stanze dove il valore è null e ordina la tabella per numero di stanza in ordine crescente
  $result2 = $conn->query($sql); //crea una variabile dove immagazzina i risultati
  $conn->close(); //chiude la connessione
  return $result2; //in fine ritorna i risultati
}
 ?>

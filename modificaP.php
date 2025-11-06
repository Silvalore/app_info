<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header('Location: login.php');

$id = $_GET['id'];
$persone = leggi_persone();
$persona = $persone[$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $persone[$id] = [
        'codice_fiscale' => $_POST['codice_fiscale'],
        'nome' => $_POST['nome'],
        'cognome' => $_POST['cognome'],
        'data_nascita' => $_POST['data_nascita']
    ];
    scrivi_persone($persone);
    header('Location: dashboard.php');
}
?>

<form method="POST">
  <h2>Modifica i dati della persona</h2>
  Codice fiscale: <input type="text" name="codice_fiscale" value="<?= $persona['codice_fiscale'] ?>"><br>
  Nome: <input type="text" name="nome" value="<?= $persona['nome'] ?>"><br>
  Cognome: <input type="text" name="cognome" value="<?= $persona['cognome'] ?>"><br>
  Data di nascita: <input type="date" name="data_nascita" value="<?= $persona['data_nascita'] ?>"><br>
  <button type="submit">Aggiorna</button>
</form>

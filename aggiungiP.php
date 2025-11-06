<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header('Location: login.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $persone = leggi_persone();
    $nuova = [
        'codice_fiscale' => $_POST['codice_fiscale'],
        'nome' => $_POST['nome'],
        'cognome' => $_POST['cognome'],
        'data_nascita' => $_POST['data_nascita']
    ];
    $persone[] = $nuova;
    scrivi_persone($persone);
    header('Location: dashboard.php');
}
?>

<form method="POST">
  <h2>Aggiungi una nuova persona</h2>
  Codice fiscale: <input type="text" name="codice_fiscale" required><br>
  Nome: <input type="text" name="nome" required><br>
  Cognome: <input type="text" name="cognome" required><br>
  Data di nascita: <input type="date" name="data_nascita" required><br>
  <button type="submit">Salva</button>
</form>

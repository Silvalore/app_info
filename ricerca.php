<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header('Location: login.php');
$persone = leggi_persone();
?>

<h2>Ricerca nell'anagrafica</h2>
<form method="GET">
  <strong>Per cognome:</strong> <input type="text" name="cognome">
  <button type="submit" name="bySurname">Cerca</button><br><br>

  <strong>Nati dopo la data:</strong> <input type="date" name="data">
  <button type="submit" name="byDate">Cerca</button>
</form>
<hr>

<?php
$risultati = [];
if (isset($_GET['bySurname']) && $_GET['cognome'] != '') {
    foreach ($persone as $p) {
        if (stripos($p['cognome'], $_GET['cognome']) !== false) $risultati[] = $p;
    }
    echo "<h3>Risultati per cognome '{$_GET['cognome']}':</h3>";
} elseif (isset($_GET['byDate']) && $_GET['data'] != '') {
    foreach ($persone as $p) {
        if ($p['data_nascita'] > $_GET['data']) $risultati[] = $p;
    }
    echo "<h3>Persone nate dopo il {$_GET['data']}:</h3>";
}

if ($risultati) {
    echo "<table border='1'><tr><th>Codice fiscale</th><th>Nome</th><th>Cognome</th><th>Data di nascita</th></tr>";
    foreach ($risultati as $r) {
        echo "<tr><td>{$r['codice_fiscale']}</td><td>{$r['nome']}</td><td>{$r['cognome']}</td><td>{$r['data_nascita']}</td></tr>";
    }
    echo "</table>";
} elseif ($_GET) {
    echo "<p>Nessun risultato trovato.</p>";
}
?>

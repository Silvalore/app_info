<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header('Location: login.php');
$persone = leggi_persone();
?>

<h2>Benvenuto, <?= $_SESSION['user'] ?>!</h2>
<a href="add_person.php">➕ Aggiungi persona</a> |
<a href="search.php">🔍 Cerca persone</a> |
<a href="logout.php">🚪 Esci</a>
<hr>

<h3>Elenco delle persone registrate:</h3>
<table border="1">
  <tr>
    <th>Codice fiscale</th><th>Nome</th><th>Cognome</th><th>Data di nascita</th><th>Azioni</th>
  </tr>
  <?php foreach ($persone as $i => $p): ?>
  <tr>
    <td><?= $p['codice_fiscale'] ?></td>
    <td><?= $p['nome'] ?></td>
    <td><?= $p['cognome'] ?></td>
    <td><?= $p['data_nascita'] ?></td>
    <td>
      <a href="edit_person.php?id=<?= $i ?>">✏️ Modifica</a> |
      <a href="delete_person.php?id=<?= $i ?>">🗑️ Elimina</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

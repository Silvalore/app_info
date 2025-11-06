<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $utenti = leggi_utenti();
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    foreach ($utenti as $u) {
        if ($u['username'] === $username) {
            die("❌ Utente già registrato!");
        }
    }

    $utenti[] = ['username' => $username, 'password' => $password];
    scrivi_utenti($utenti);

    echo "✅ Registrazione completata. <a href='login.php'>Vai al login</a>";
}
?>

<form method="POST">
  <h2>Registrazione nuovo utente</h2>
  Nome utente: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Registrati</button>
</form>

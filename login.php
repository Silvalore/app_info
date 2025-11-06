<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $utenti = leggi_utenti();
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($utenti as $u) {
        if ($u['username'] === $username && password_verify($password, $u['password'])) {
            $_SESSION['user'] = $username;
            header('Location: dashboard.php');
            exit;
        }
    }

    echo "❌ Nome utente o password errati!";
}
?>

<form method="POST">
  <h2>Accesso</h2>
  Nome utente: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  <button type="submit">Accedi</button>
</form>

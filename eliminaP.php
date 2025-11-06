<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header('Location: login.php');

$id = $_GET['id'];
$persone = leggi_persone();
unset($persone[$id]);
scrivi_persone(array_values($persone));
header('Location: dashboard.php');
?>

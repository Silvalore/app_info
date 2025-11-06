<?php
$utenti_file = __DIR__ . '/data/utenti.json';
$persone_file = __DIR__ . '/data/persone.json';

if (!file_exists($utenti_file)) file_put_contents($utenti_file, '[]');
if (!file_exists($persone_file)) file_put_contents($persone_file, '[]');

function leggi_utenti() {
    global $utenti_file;
    return json_decode(file_get_contents($utenti_file), true);
}

function scrivi_utenti($dati) {
    global $utenti_file;
    file_put_contents($utenti_file, json_encode($dati, JSON_PRETTY_PRINT));
}

function leggi_persone() {
    global $persone_file;
    return json_decode(file_get_contents($persone_file), true);
}

function scrivi_persone($dati) {
    global $persone_file;
    file_put_contents($persone_file, json_encode($dati, JSON_PRETTY_PRINT));
}
?>

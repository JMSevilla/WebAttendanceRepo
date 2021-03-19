<?php
define("myadminserver", "syncteamserver.mysql.database.azure.com");
define("myadminusername", "syncmethodserver@syncteamserver");
define("myadminpassword", "Jmsevilla123");
define("myadmindatabase", "dbattendance");

try {
    $pdo = new PDO("mysql:host=" . myadminserver . ";dbname=" . myadmindatabase, myadminusername, myadminpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $exception){
    die("Could not connect to the database" . $exception->getMessage());
}
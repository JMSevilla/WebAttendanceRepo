<?php

define("dbserver", "syncteamserver.mysql.database.azure.com");
define("dbusername", "syncmethodserver@syncteamserver");
define("dbpassword", "Jmsevilla123");
define("dbname", "dbattendance");

try {
    $pdo = new PDO("mysql:host=" . dbserver . ";dbname=" . dbname , dbusername, dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect" . $e->getMessage());
}
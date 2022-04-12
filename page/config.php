<?php
$dbhost = "localhost";
$dbname = "app_studentsmanagement";
$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "erreur! =" . $e->getMessage() . "</br>";
    die();
}

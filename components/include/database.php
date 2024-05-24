<?php

$servername = "sql7.freemysqlhosting.net";
$username = "sql7706871";
$password = "4FsaiwVtc1";
$dbname = "sql7706871";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Conexión fallida: ". mysqli_error($conn));
}
<?php
$pass = "ramirez2309";
$user = "admin";
$db = "ventas";
try {
    $conn = new PDO("sqlsrv:server=database-1.c5p9ujkhlrxq.sa-east-1.rds.amazonaws.com;database=$db",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un ERROR con la base de datos: " . $e->getMessage();
}
?>
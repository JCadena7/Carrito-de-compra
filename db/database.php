<?php
$pass = "rodrigo..m.";
$user = "sa";
$db = "ventas2";
try {
    $conn = new PDO("sqlsrv:server=localhost;database=$db",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un ERROR con la base de datos: " . $e->getMessage();
}
?>
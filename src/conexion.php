<?php
// Lee las variables de entorno de Render
$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$port = getenv('DB_PORT'); // El puerto de MySQL, generalmente 3306

// Construye el DSN con las variables de entorno
$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Es buena práctica no mostrar el error completo en producción,
    // pero para depuración es útil.
    die('❌ Error de conexión: ' . $e->getMessage());
}
?>

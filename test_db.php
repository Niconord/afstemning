<?php
$host = 'mysql69.unoeuro.com';
$dbname = 'njdesign_dk_db';
$user = 'njdesign_dk';
$pass = 'JohnnyBravo1337';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

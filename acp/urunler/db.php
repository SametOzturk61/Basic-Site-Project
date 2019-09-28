<?php
$dsn = 'mysql:host=localhost;dbname=database';
$username = 'root';
$password = '';
$options = ["SET CHARACTER SET utf8"];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
}
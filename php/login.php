<?php
header("Access-Control-Allow-Origin: *");
?>
<?php


$host = 'localhost:3307'; // Адрес вашей MySQL базы данных
$username = $_POST["username"];
$password = $_POST["password"];
// Ваш пароль MySQL
$database = 'azs'; // Ваша база данных

// Подключение к MySQL
$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
   echo false;
} else {
   echo true;
}

$connection->close();
?>
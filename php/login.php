<?php
 header("Access-Control-Allow-Origin: *");
?>
<?php
$host = 'localhost:3306'; // Адрес вашей MySQL базы данных
$username = 'root'; // Ваше имя пользователя MySQL
$password = 'Idinaxyutvar1'; // Ваш пароль MySQL
$database = 'azs'; // Ваша база данных

// Подключение к MySQL
$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Ошибка подключения к базе данных: " . $connection->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_raw = file_get_contents('php://input');
    
        $request = json_decode($request_raw,true);
       
       $username=$request["username"];
       $password=$request["password"];
      
   

    
    $query = "select * from login WHERE user_name ='$username' AND password_='$password'" ;
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        
        echo true;
    } else {
        echo false;
    }
}

$connection->close();
?>
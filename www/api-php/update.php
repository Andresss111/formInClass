<?php
//Permite recibir peticiones desde cualquier dirección
header("Access-Control-Allow-Origin:*");
//Para recibir datos enviados en el cuerpo de la petición
$rawData = file_get_contents("php://input");
//Para ver en pantalla que estamos recibiendo
//print_r($rawData);
//Transformar el rawData en un archivo PHP
$user = json_decode($rawData);

$dsn = "mysql:dbname=store;host=localhost:3306";
$username = "root";
$password = "1234";
$connection = new PDO($dsn, $username, $password);

echo 'Conexion valida';

print_r($user);

$id = $user->id;
$name = $user->name;
$email = $user->email;
$birthdate = $user->birthdate;
$sexo = $user->sexo;

$query = "UPDATE users SET username = '$name', email = '$email', birthdate = '$birthdate', sexo = $sexo WHERE id=$id";
 
echo $query; 

$connection->query($query);
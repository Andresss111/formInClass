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

$name = $user->name;
$email = $user->email;
$birthDate = $user->date_born;
$sexo = $user->sexo;

$query = "INSERT INTO users (username, email, birthdate, sexo) VALUES('$name','$email','$birthDate','$sexo')";
 
echo $query; 

$connection->query($query);

  
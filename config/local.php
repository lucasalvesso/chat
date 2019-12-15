<?php

$host = '172.32.0.112';
$base = 'banco';
$user = 'banco';
$pass = 'banco';


try{
    $db = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
//    var_dump();

}catch (PDOException $e){
    echo $e->getMessage();
}


?>
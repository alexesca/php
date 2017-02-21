<?php
$dsn = 'mysql:host=us-cdbr-azure-southcentral-f.cloudapp.net;dbname=cit335sqldb';
$username = 'b3f0a7f17f96bb';
$password = 'cd64abe7';

/*$dsn = 'mysql:host=localhost;dbname=products';
$username = 'root';
$password = '';*/

try{
    $db = new PDO($dsn,$username,$password); 
}catch (Exception $e){
    echo "<h3 style='color: red'>Connection failed.</h3";
}



?>
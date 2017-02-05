<?php
$dsn = 'mysql:host=sql9.freemysqlhosting.net;dbname=sql9157281';
$username = 'sql9157281';
$password = 'Dn72yfQb3j';

try{
    $db = new PDO($dsn,$username,$password); 
}catch (Exception $e){
    echo "<h3 style='color: red'>Connection failed.</h3";
}



?>
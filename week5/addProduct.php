<?php
include_once('../db/connection.php');
$categoryId = filter_input(INPUT_POST,'categoryId',FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST,'code');
$name = filter_input(INPUT_POST,'name');
$price = filter_input(INPUT_POST,'price',FILTER_VALIDATE_INT);

if($name && $code && $categoryId && $price){
    try{
        $insert = "INSERT INTO products (code, name, price, categoryId) VALUES (:code, :name, :price, :categoryId)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->execute();
        //$statement->closeCursor();
        include('index.php');
    }catch(Exception $e){
        echo "<h3 style='color:red'>Could not add the product. Try again :(</h3>";
    }

}else{
    echo "<h3>There are some values missing or the values are incorrect. Please check the values and try again.</h3>";
}
?>
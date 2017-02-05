<?php
include_once('../db/connection.php');
$productId = $_GET['id'];
$categoryId = filter_input(INPUT_POST,'categoryId',FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST,'code');
$name = filter_input(INPUT_POST,'name');
$price = filter_input(INPUT_POST,'price',FILTER_VALIDATE_INT);

if($name && $code && $categoryId && $price){
    try{
        $update = "UPDATE products SET code=:code, name=:name, price=:price, categoryId=:categoryId WHERE id=:productId";
        $statement = $db->prepare($update);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':categoryId', $categoryId);
        $statement->bindValue(':productId', $productId);
        $statement->execute();
        //$statement->closeCursor();
        include('index.php');
    }catch(Exception $e){
        echo "<h3 style='color:red'>Could not update the product. Try again :(</h3>";
    }

}else{
    echo "<h3>There are some values missing or the values are incorrect. Please check the values and try again.</h3>";
}
?>
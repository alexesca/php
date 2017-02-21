<?php


function getProducts($db){
    $query = "SELECT * FROM products";
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}


function addProduct($db,$categoryId,$code,$name,$price){
    $insert = "INSERT INTO products (categoryId, code, name, price) VALUES (:categoryId, :code, :name, :price)";
    $statement = $db->prepare($insert);
    $statement->bindValue(':categoryId', $categoryId);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
}


function getProductsByCategory($db, $categoryId){
    $query = "SELECT * FROM products WHERE categoryId = :categoryId";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryId', $categoryId);
    $statement->execute();
    $products = $statement->fetchAll();
    return $products;
}


function deleteProduct($db, $productId){
    $delete = "DELETE FROM products WHERE id = :id";
    $statement = $db->prepare($delete);
    $statement->bindValue(':id', $productId);
    $statement->execute();
    $statement->closeCursor();
}

function getProductInfo($db, $productId){
    $query = "SELECT * FROM products WHERE id = :productId";
    $statement = $db->prepare($query);
    $statement->bindValue(':productId', $productId);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function calculateDiscount($price){
    $discount = $price * .3;
    $total = $price - $discount;
    return $total;
}

?>
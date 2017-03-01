<?php

function  listProducts($db){
    $query = "SELECT * FROM products";
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function registerProduct($db, $customerID, $productCode, $registrationDate){
    try{
        $insert = "INSERT INTO registrations  (customerID, productCode, registrationDate) VALUES (:customerID, :productCode, :registrationDate)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':customerID', $customerID);
        $statement->bindValue(':productCode', $productCode);
        $statement->bindValue(':registrationDate', $registrationDate);
        $statement->execute();
        if($statement){
            return true;
        }else{
            return false;
        }
    }catch(PDOException $e){
        return false;
    }
}

?>
<?php

function countLogin($db,$email){
    $query = "SELECT COUNT(customerID) AS count FROM customers WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    return $customer;
}

function login($db,$email){
    $query = "SELECT * FROM customers WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    return $customer;
}

?>
<?php

function getCategories($db){
    $query = "SELECT * from categories";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function addCategory($db, $category){
    $insert = "INSERT INTO categories (name) VALUES (:category)";
    $statement = $db->prepare($insert);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $statement->closeCursor();
}

function deleteCategory($db, $categoryId){
    $delete = "DELETE FROM categories WHERE id = :categoryId";
    $statement = $db->prepare($delete);
    $statement->bindValue('categoryId',$categoryId);
    $statement->execute();
    $statement->closeCursor();
}

?>
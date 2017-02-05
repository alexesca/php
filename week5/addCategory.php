<?php
include_once('../db/connection.php');
$category = filter_input(INPUT_POST,'category');

if($category){
    try{
        $insert = "INSERT INTO categories (name) VALUES (:category)";
        $statement = $db->prepare($insert);
        $statement->bindValue(':category', $category);
        $statement->execute();
        //$statement->closeCursor();
        include('categoryList.php');
    }catch(Exception $e){
        echo "<h3 style='color:red'>Could not add the category. Try again :(</h3>";
    }

}else{
    echo "<h3>Type in a new category</h3>";
}
?>
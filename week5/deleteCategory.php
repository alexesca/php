<?php
include_once('../db/connection.php');
$id = $_GET['id'];
$delete = "DELETE FROM categories WHERE id = :id";
$statement = $db->prepare($delete);
$statement->bindValue(':id', $id);
$statement->execute();
$statement->closeCursor();
include('categoryList.php');
?>
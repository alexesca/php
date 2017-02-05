<?php
include_once('../db/connection.php');
$productId = $_GET['id'];
$delete = "DELETE FROM products WHERE id = :productId";
$statement = $db->prepare($delete);
$statement->bindValue(':productId', $productId);
$statement->execute();
$statement->closeCursor();
include('index.php');
?>
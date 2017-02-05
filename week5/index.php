<?php
include '../db/connection.php';
$categoryQuery = "select * from categories";
$statement = $db->prepare($categoryQuery);
$statement->execute();
$category =  $statement->fetchAll();


$productQuery = "select * from products";
$statement2 = $db->prepare($productQuery);
$statement2->execute();
$products =  $statement2->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<ol class="breadcrumb">
  <li><a href="../index.php">Home</a></li>
  <li><a href="#">week 5</a></li>
</ol>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <a href="categoryList.php" class="btn btn-success btn-md active" role="button">Categories</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <?php foreach($category as $item): ?>
                         <li><?php echo $item['name'];?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
                <div class="col-md-9">
               <table class="table table-hover">
                    <thead>
                        <th>Code</th>
                            <th>Name</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                            <tr><?php $id = $product['id']; ?>
                                <td><?php echo $product['code'];?></td>
                                <td><?php echo $product['name'];?></td>
                                <td><?php echo $product['price'];?></td>
                                <td><?php echo "<a href='deleteProduct.php?id=$id' class='btn btn-danger btn-xs active' role='button'>Delete</a></td>"?>
                                <td><?php echo "<a href='editProductForm.php?id=$id' class='btn btn-primary btn-xs active' role='button'>Edit</a>"?></td>;
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
               </table>
               <a href="addProductForm.php" class="btn btn-warning btn-md active" role="button">Add product</a>
        </div>  
        
    </div>
    
</body>
</html>
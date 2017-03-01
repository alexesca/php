<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php require_once('bootstrap.style.php'); ?>
</head>
<?php include('header.php'); ?>
<body>
<div class="container">
    <h3>Product Registration</h3><br>
    <?php 
        if($error){
            echo $error;
        }else{
            echo "<h4>Product ({$productCode}) was registered</h4>";
        }
    ?>
</div>
</body>
<?php include('footer.php'); ?>
</html>
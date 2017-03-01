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
    <h3>Register Product</h3><br>
    <h4><strong>Name:</strong> <?php echo $firstName . " " . $lastName  ?></h4>
    <form action="index.php" method="post" class="form-inline">
        <select  class="form-control" name="productCode">
            <?php foreach($products as $product):?>
            <option value="<?php echo $product['productCode']; ?>"><?php echo $product['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="customerID" value="<?php echo $customerID; ?>">
        <input type="hidden" name="action" value="PRODUCT_REGISTRATION_CONFIRMATION">
        <button type="submit" class="btn btn-primary">Register Product</button>
    </form>
</div>
</body>
<?php include('footer.php'); ?>
</html>
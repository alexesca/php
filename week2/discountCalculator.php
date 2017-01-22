<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php
$productDescription = $_GET['description']; 
$listPrice = $_GET['listPrice'];
$standardDiscount = $_GET['discount'];
$discountAmount = ($standardDiscount * $listPrice) / 100;
$discountPrice = $listPrice - $discountAmount;
$tax = $discountPrice * .065;
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Product Discount <a href="../index.php" class="btn btn-default btn-lg active" role="button">Back</a></div>
    <ul class="list-group">
        <li class="list-group-item">List Price:  $<?php echo $listPrice ?></li>
        <li class="list-group-item">Standard Discount:  <?php echo $standardDiscount ?>% </li>
        <li class="list-group-item">Discount Amount: $<?php echo $discountAmount ?></li>
        <li class="list-group-item">Discount Price: $<?php echo $discountPrice ?></li>
        <li class="list-group-item">Tax %: 6.5% </li>
        <li class="list-group-item">Tax: $<?php echo $tax ?> </li>
    </ul>
</div>

</body>
</html>
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
<div class="container">
    <?php include_once('header.view.php');?>
    <h3>Product List</h3>
    <div class="row">
        <div class="col-md-4">
            <Strong>Category</strong>
            <div class="row"><!--Put categories here-->
                <div class="col">
                <?php
                    foreach($categories as $category  ){
                        echo "<div class='row'><div class='col'><a href='index.php?action=LIST_PRODUCTS_BY_CATEGORY&categoryId={$category['id']}'>{$category['name']}</a></div></div>";
                    }
                ?>
                <a href="index.php?action=ADD_CATEGORY_FORM">Add Category</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
        <strong>Drums</strong>
        <table class="table table-striped">
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
            <th>&nbsp;</th>
            <?php
                foreach($products as $product){
                    echo "<tr>";
                    echo "<td>{$product['code']}</a></td>";
                    echo "<td>{$product['name']}</a></td>";
                    echo "<td>{$product['price']}</a></td>";
                    echo "<td><a href='index.php?action=DELETE_PRODUCT&productId={$product['id']}&categoryId={$categoryId}'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <a href="index.php?action=ADD_PRODUCT_FORM">Add product</a>
        </div>
    </div>
</div>
    <?php include_once('footer.view.php');?>
</body>
</html>
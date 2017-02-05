<?php
include_once '../db/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <h1>Product Manager</h1>
    <hr>
<?php if($db){
$categoryQuery = "select * from categories";
$statement = $db->prepare($categoryQuery);
$statement->execute();
$categories =  $statement->fetchAll();

?>
    <h2>Add product</h2>
        <div class="row">
            <div class="col-md-6">
                <form action="addProduct.php" method="post">
                    <select  class="form-control" name="categoryId">
                    <?php foreach($categories as $category):?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code"  name="code" placeholder="Code">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control"  name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAmount">Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" id="exampleInputAmount"  name="price" placeholder="Price">
                        <div class="input-group-addon">.00</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Success</button>
                </form>
            </div>
        </div>
<?php }else{
echo "<p>Could not connect to the DB. Check internet connection ";
} ?>
  </div>
</body>
</html>
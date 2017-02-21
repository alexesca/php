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
    <h1>Category List</h1><a href='index.php' class='btn btn-link btn-md ' role='button'><- Take me to the main page</a>
    <hr>
<?php if($db){

$categoryQuery = "select * from categories";
$statement = $db->prepare($categoryQuery);
$statement->execute();
$categories = 
$statement->fetchAll();
?>
        <?php foreach($categories as $item): ?>
        <?php $id = $item['id'];?>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-6">
                            <?php echo $item['name'];?>
                    </div>
                    <div class="col-md-6">
                        <?php echo "<a href='deleteCategory.php?id=$id' class='btn btn-danger btn-xs danger' role='button'>Delete</a>"?>
                    </div>
                </div>
            </div><br>
        <?php endforeach; ?>
    <h2>Category</h2>
        <div class="row">
            <div class="col-md-6">
                <?php echo "<form action='addCategory.php' method='post' class='form-inline'>" ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="category"  name="category"  placeholder="Category">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
<?php }else{
echo "<p>Could not connect to the DB. Check internet connection ";
} ?>
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php require_once('bootstrap.style.php'); ?>
</head>
<?php require('header.php'); ?>
<body>
<div class="container">
    <h3>Customer Login</h3>
    <h5>You must login before you can register a product</h5>
    <div class="row">
        <div class="col-md-6">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                    <input type="hidden" value="PRODUCT_REGISTRATION" name="action">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php echo "</br>" . $error; ?>
        </div>
    </div>
</div>
</body>
<?php require('footer.php'); ?>
</html>
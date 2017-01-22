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
    <form action="discountCalculator.php" method="get">
    <div class="form-group">
        <label for="exampleInputEmail1">Product Description:</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="description">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">List Price</label>
        <input type="text" class="form-control" id="listPrice" name="listPrice" placeholder="list Price">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Discount</label>
        <input type="text" class="form-control" id="discount" name="discount" placeholder="discount">
    </div>
  </div>
        <a href="../index.php" class="btn btn-default btn-lg active" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
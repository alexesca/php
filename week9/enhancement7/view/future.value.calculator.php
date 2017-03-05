
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="index.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <select  class="form-control" name="investment">
                <?php for($i=10000; $i<=50000; $i = $i + 5000):?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <br>

            <label>Yearly Interest Rate:</label>
            <select  class="form-control" name="interest_rate">
                <?php for($i=4; $i<=12; $i = $i + .5):?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select><br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br>
            <input type="checkbox" name="compound" value="1">Compund Interes
        </div>
        <input type="hidden" name="action" value="calculate"/>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"/><br>
        </div>

    </form>
    </main>
</body>
</html>
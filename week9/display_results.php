<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // get the rest of the data for the form

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo filter_input(INPUT_POST, 'password'); ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo filter_input(INPUT_POST, 'phone'); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo filter_input(INPUT_POST, 'heard_from'); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo isset($_POST['wants_updates']); ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo  filter_input(INPUT_POST, 'contact_via'); ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo  filter_input(INPUT_POST, 'comments'); ?></span><br>        
    </main>
</body>
</html>
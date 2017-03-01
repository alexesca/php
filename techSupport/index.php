<?php
require_once('./db/connection.php');
require_once('./model/login.php');
require_once('./model/products.php');

//Getting variables
$postValue = filter_input(INPUT_POST,'action');
$getValue = filter_input(INPUT_GET,'action');

if($postValue == 'PRODUCT_REGISTRATION'){
    $email = filter_input(INPUT_POST,'email');
    if($email){
        $count = countLogin($db,$email);
        if($count['count']){
            $customer = login($db, $email);
            $firstName = $customer['firstName'];
            $lastName = $customer['lastName'];
            $customerID = $customer['customerID'];
            $products = listProducts($db);
            require('./view/product.register.php');
        }else{
            $showError = true;
            $error = "We could not find your email. Try again :)";
            require('./view/customer.login.php');
        }
    }else{
        $error = "<div class='alert alert-danger' role='alert'>Please, enter a valid email.</div>";
        require('./view/customer.login.php');
    }
}elseif($postValue == 'PRODUCT_REGISTRATION_CONFIRMATION'){
    $productCode = filter_input(INPUT_POST,'productCode');
    $customerID = filter_input(INPUT_POST,'customerID',FILTER_VALIDATE_INT);
    $registrationDate = new DateTime();
    $registrationDate = $registrationDate->format('Y-m-d H:i:s');
    if($productCode && $customerID && $registrationDate){
        try{
            $error = "";
            $register = registerProduct($db, $customerID, $productCode, $registrationDate);
            if($register){
                require('./view/product.register.confirmation.php');
                $productCode = "";
                $customerID = "";
                $action = "";
            }else{
                $error = "<div class='alert alert-danger' role='alert'>The product cannot be registered with this email.</div>";
                require('./view/product.register.confirmation.php');
            }
        }catch(PDOException $e){
            echo $e;
        }
    }else{
        $error = "<div class='alert' role='alert'>Please use the appropriate gate.</div>";
        require('./view/product.register.confirmation.php');
    }
    
}elseif($postValue == 'LOGIN_PAGE'){
    $error = "";
    require('./view/customer.login.php');
}elseif(!$postValue){
    $error = "";
    require('./view/customer.login.php');
}else{
    $error = "";
    require('./view/customer.login.php');
}

$customer = "";

?>
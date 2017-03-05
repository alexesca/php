<?php
$action = filter_input(INPUT_POST,'action');

if(!$action){
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = '10000'; } 
    if (!isset($interest_rate)) { $interest_rate = '5'; } 
    if (!isset($years)) { $years = '5'; } 
    
    require('./view/future.value.calculator.php');
    exit();
}
// get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', 
            FILTER_VALIDATE_FLOAT);
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', 
            FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', 
            FILTER_VALIDATE_INT);
    $compound = filter_input(INPUT_POST, 'compound', 
            FILTER_VALIDATE_INT);

    // validate investment
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.'; 
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; 
    // validate interest rate
    } else if ( $interest_rate === FALSE )  {
        $error_message = 'Interest rate must be a valid number.'; 
    } else if ( $interest_rate <= 0 ) {
        $error_message = 'Interest rate must be greater than zero.'; 
    // validate years
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    // set error message to empty string if no invalid entries
    } else {
        $error_message = ''; 
    }


if($action == "calculate" && !$error_message){

    // calculate the future value
    $future_value = $investment;
    if(!$compound){
        for ($i = 1; $i <= $years*12; $i++) {
            $future_value = ($future_value + ($future_value * ($interest_rate / 12) *.01));
        }
    }else{
        for ($i = 1; $i <= $years; $i++) {
            $future_value = ($future_value + ($future_value * $interest_rate *.01));
        }
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);

    require('./view/display_results.php');
}else{
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = '10000'; } 
    if (!isset($interest_rate)) { $interest_rate = '5'; } 
    if (!isset($years)) { $years = '5'; } 
    
    require('./view/future.value.calculator.php');
}




?>
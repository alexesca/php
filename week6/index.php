<?php
include_once('../db/connection.php');
include_once('product.model.php');
include_once('category.model.php');


$getValue = filter_input(INPUT_GET,'action');

$postValue = filter_input(INPUT_POST,'action');

if($getValue){
    $action = $getValue;
}else if($postValue ){
    $action = $postValue;
}else{
    $action = 'LIST_PRODUCTS';
}


if($action == 'LIST_PRODUCTS'){
    $categories = getCategories($db);
    $products = getProducts($db);
    include('productList.view.php');
}

if($action == 'USERS_LIST_PRODUCTS'){
    $categories = getCategories($db);
    $products = getProducts($db);
    echo count($products);
    include('userProductList.view.php');
}

if($action == 'LIST_PRODUCTS_BY_CATEGORY'){
    $categoryId = filter_input(INPUT_GET,'categoryId', FILTER_VALIDATE_INT);
    if($categoryId){
        $categories = getCategories($db);
        $products = getProductsByCategory($db,$categoryId);
        include('productsByCategory.view.php');
    }else{
        $error = "Please check the values and try again. <a href='index.php'>Take me there</a>";
        include('error.php');
    }
}

if($action == 'USER_LIST_PRODUCTS_BY_CATEGORY'){
    $categoryId = filter_input(INPUT_GET,'categoryId', FILTER_VALIDATE_INT);
    if($categoryId){
        $categories = getCategories($db);
        $products = getProductsByCategory($db,$categoryId);
        include('usersProductsByCategory.view.php');
    }else{
        $error = "Please check the values and try again. <a href='index.php'>Take me there</a>";
        include('error.php');
    }
}

if($action == 'DELETE_PRODUCT'){
    $productId = filter_input(INPUT_GET,'productId', FILTER_VALIDATE_INT);
    $categoryId = filter_input(INPUT_GET,'categoryId', FILTER_VALIDATE_INT);
    if($productId){
        $delete = deleteProduct($db,$productId);
        header("Location: index.php?action=LIST_PRODUCTS&categoryId={$categoryId}");
    }
    else{
        $error = "Please check the values and try again. <a href='index.php'>Take me there</a>";
        include('error.php');
    }
        
}

if($action == 'ADD_PRODUCT_FORM'){
    $categories = getCategories($db);
    include('addProduct.view.php');
}

if($action == 'ADD_PRODUCT'){
    $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST,'code');
    $name = filter_input(INPUT_POST,'name');
    $price = filter_input(INPUT_POST,'price', FILTER_VALIDATE_FLOAT);
    if($categoryId && $code && $name && $price > 0){
        $addProduct = addProduct($db,$categoryId, $code, $name, $price);
        header("Location: index.php");
    }else{
        $error = "Please check the values and try again. <a href='index.php'>Take me there</a>";
        include('error.php');
    }
}

if($action == 'VIEW_PRODUCT'){
    $productId = filter_input(INPUT_GET, 'productId', FILTER_VALIDATE_INT);
    if($productId){
        $categories = getCategories($db);
        $product = getProductInfo($db,$productId);
        include('product.info.view.php');
    }else{
        $error = "Please check the values and try again. <a href='index.php'>Take me there</a>";
        include('error.php');
    }
}

if($action == 'ADD_CATEGORY_FORM'){
    $categories = getCategories($db);
    include('add.category.view.php');
}


if($action == 'ADD_CATEGORY'){
    $category = filter_input(INPUT_POST,'category');
    if($category){
        $categories = getCategories($db);
        $addCategory = addCategory($db, $category);
        header("Location: index.php?action=ADD_CATEGORY");
    }else{
        $categories = getCategories($db);
        include('add.category.view.php');
    }
}


if($action == 'DELETE_CATEGORY'){
    $categoryId = filter_input(INPUT_GET,'categoryId', FILTER_VALIDATE_INT);
    if($categoryId){
        $deleteCategory = deleteCategory($db,$categoryId);
        header("Location: index.php?action=ADD_CATEGORY_FORM");
    }else{
        $error = "Please check the category ID.";
        include('error.php');
    }
}

?>
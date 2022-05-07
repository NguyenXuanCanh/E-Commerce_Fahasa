<?php
session_start();
include('../class/category.php');

$categoryItem = $_POST['categoryData'];
$categoryName = $categoryItem['categoryName'];
$categoryDes = $categoryItem['categoryDes'];

if (empty($categoryName) || empty($categoryDes)) {
    echo "Fill in all the input fields.";
    exit;
}

$cate = new Category();
$result = $cate->add($categoryItem);
if ($result) {
    echo '';
}

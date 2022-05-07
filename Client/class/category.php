<?php
class category
{
    function getAll()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM category");
    }
    function add($cate)
    {
        require('../connection.php');
        $categoryName = $cate['categoryName'];
        $categoryDes = $cate['categoryDes'];
        return $conn->query("INSERT INTO category (`Name`,`Description`) VALUE ('$categoryName', '$categoryDes')");
    }
    function getCateByID($cateID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM category WHERE CategoryID='$cateID'");
    }
    function getCateByBookID($bookID){
        require('./connection.php');
        return $conn->query("SELECT CategoryID FROM book WHERE BookID='$bookID'");
    }
}

<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include("connection.php");
$bookID = $_POST['BookID'];
$customerID=$_SESSION['userId'];

$find=$conn->query("SELECT * FROM wistlist WHERE CustomerID='$customerID' AND BookID = '$bookID'");
$find=$find->fetch_assoc();
if($find['CustomerID']){
    $res=$conn->query("DELETE FROM wistlist WHERE CustomerID='$customerID' AND BookID = '$bookID'");
    echo "Bỏ thích thành công";
}else{
    $res=$conn->query("INSERT INTO wistlist (`CustomerID`,`BookID`) VALUE ('$customerID', '$bookID')");
    echo "Thêm thành công";
}

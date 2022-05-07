<?php
include('../class/customer.php');

$CustomerID = $_POST['CustomerID'];
$Password = $_POST['Password'];
$FullName = $_POST['FullName'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$PhoneNumber = $_POST['PhoneNumber'];
$PermissionID = $_POST['PermissionID'];

$cus = new Customer();
$cus=$cus->addFullInfo($CustomerID,$Password,$FullName,$Address,$Email,$PhoneNumber,$PermissionID);
if($cus){
    exit("Thêm thành công");
}else{
    exit("Thêm thất bại, có lỗi xảy ra");
}
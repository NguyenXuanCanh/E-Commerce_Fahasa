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
$cus = $cus->updateCustomer($CustomerID, $Password, $FullName, $Address, $Email, $PhoneNumber, $PermissionID);
if($cus){
    exit("Sửa thành công");
}

<?php
class Customer
{
    //method
    function getByID($cusId)
    {
        require('../connection.php');
        return $conn->query("SELECT * FROM customers WHERE CustomerID='$cusId'");
    }
    function getByFunctionID()
    {
        require('../connection.php');
        $resPermission=$conn->query("SELECT PermissionID FROM permissiondetail WHERE FunctionID=9");
        return ($resPermission);
        // $conn->query("SELECT * FROM permissiondetail WHERE FunctionID='$permissionID'");
    }
    function add($cus)
    {
        require('../connection.php');
        $cusUsername = $cus['username'];
        $cusPassword = $cus['password'];
        $cusAddress = $cus['address'];
        $cusEmail = $cus['email'];
        $cusFullName = $cus['fullname'];
        $phone = $cus['phone'];
        return $conn->query("INSERT INTO customers VALUE ('$cusUsername', '$cusPassword','$cusFullName','$cusAddress','$cusEmail','$phone','2','1')");
    }
}

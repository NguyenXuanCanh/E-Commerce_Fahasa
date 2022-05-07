<?php
class Customer
{
    //method
    function getByID($cusId)
    {
        require('../connection.php');
        return $conn->query("SELECT * FROM customers WHERE CustomerID='$cusId'");
    }
    function getAll()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM customers");
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
        return $conn->query("INSERT INTO customers VALUE ('$cusUsername', '$cusPassword','$cusFullName','$cusAddress','$cusEmail','$phone','1','1')");
    }
    function addFullInfo($CustomerID, $Password,$FullName,$Address,$Email,$PhoneNumber,$PermissionID)
    {
        require('../connection.php');
        return $conn->query("INSERT INTO customers VALUE ('$CustomerID', '$Password','$FullName','$Address','$Email','$PhoneNumber','$PermissionID','1')");
    }
    function setAble($cusId)
    {
        require('../connection.php');
        $res = $conn->query("SELECT Status FROM customers WHERE CustomerID='$cusId'");
        $res = $res->fetch_assoc();
        $status = $res['Status'];
        if ($status) {
            return $conn->query("UPDATE customers SET Status=0 WHERE CustomerID='$cusId'");
        } else {
            return $conn->query("UPDATE customers SET Status=1 WHERE CustomerID='$cusId'");
        }
    }
    function delete($cusId)
    {
        require('../connection.php');
        return $conn->query("DELETE FROM customers WHERE CustomerID='$cusId'");
    }
    function updateCustomer($CustomerID, $Password, $FullName, $Address, $Email, $PhoneNumber, $PermissionID)
    {
        require('../connection.php');
        if ($Password) {
            return $conn->query("UPDATE customers SET Password='$Password',FullName='$FullName',Address='$Address',Email='$Email',PhoneNumber='$PhoneNumber',PermissionID='$PermissionID' WHERE CustomerID='$CustomerID'");
        } else {
            return $conn->query("UPDATE customers SET FullName='$FullName',Address='$Address',Email='$Email',PhoneNumber='$PhoneNumber',PermissionID='$PermissionID' WHERE CustomerID='$CustomerID'");
        }
    }
    function getManageAccounts()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM customers WHERE PermissionID <> 2");
    }
    function getUserAccounts()
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM customers WHERE PermissionID = 2");
    }
}

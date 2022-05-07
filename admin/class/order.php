<?php
class Order
{
    function getAllOrder($cusID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM orders WHERE CustomerID = '$cusID'");
    }
    function getOrderByID($orderID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM orders WHERE OrderID = '$orderID'");
    }
    function getOrderDetail($orderID)
    {
        require('./connection.php');
        return $conn->query("SELECT * FROM orderdetail WHERE OrderID = '$orderID'");
    }
    function deleteOrder($orderID)
    {
        require('../connection.php');
        return $conn->query("UPDATE orders SET Shipped=100  WHERE OrderID = '$orderID'");
    }
    function deleteOrderDetail($orderID)
    {
        require('../connection.php');
        return $conn->query("DELETE FROM orderdetail WHERE OrderID = '$orderID'");
    }
    function backToBook($bookID, $Quantity)
    {
        require('../connection.php');
        $conn->query("UPDATE book SET Sold= Sold- $Quantity WHERE BookID = '$bookID'");
        return $conn->query("UPDATE book SET Amount= Amount+ $Quantity WHERE BookID = '$bookID'");
    }
    function addOrder($order)
    {
        require('../connection.php');
        $CustomerID = $order['CustomerID'];
        $Date = $order['Date'];
        $Total = $order['Total'];
        $Note = $order['Note'];
        $conn->query("INSERT INTO orders (`CustomerID`,`Date`,`Total`,`Note`) VALUE ('$CustomerID', '$Date','$Total','$Note')"); //insert_id=last item id
        return $conn->insert_id;
    }
    function addOrderDetails($detail, $orderID)
    {
        require('../connection.php');
        $VegetableID = $detail['BookID'];
        $Quantity = $detail['Quantity'];
        $Price = $detail['Price'];

        $conn->query("UPDATE book SET Amount = Amount - '$Quantity'  WHERE BookID='$VegetableID'");
        $conn->query("UPDATE book SET Sold = Sold + '$Quantity'  WHERE BookID='$VegetableID'");

        return $conn->query("INSERT INTO orderdetail (`BookID`,`Quantity`,`Price`,`OrderID`) VALUE ('$VegetableID', '$Quantity','$Price','$orderID')");
    }
}

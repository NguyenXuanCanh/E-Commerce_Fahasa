<?php
session_start();
if (empty($_SESSION['userId'])) {
    echo 'notLogin';
    exit;
}

if (empty($_SESSION['giohang'])) {
    echo 'Chưa có hàng trong giỏ.';
    exit;
}

include('../class/order.php');
$order = new Order();

//create order, add to order table using Order class
$orderItem['CustomerID'] = $_SESSION['userId'];
$orderItem['Date'] = date('Y-m-d');
$orderItem['Total'] = $_POST['tongTien'];
//add order first
$orderID = $order->addOrder($orderItem);

//create orderDetails, add to orderdetail table using Order class
foreach ($_SESSION['giohang'] as $VegetableID => $row) {
    $detail['BookID'] = $row['BookID'];
    $detail['Quantity'] = $row['soluong'];
    $detail['Price'] = $row['Price'] * (1 - $row['Discount']);
    $resultAddOrderDetail = $order->addOrderDetails($detail, $orderID);
}

if (!$resultAddOrderDetail) {
    echo "Có lỗi xảy ra";
    exit;
}

$_SESSION['giohang'] = [];
echo "";

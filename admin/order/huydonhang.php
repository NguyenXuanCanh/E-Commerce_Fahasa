<?php
session_start();
include('../class/order.php');
include('../connection.php');
$OrderID = $_POST['OrderID'];
$order = $conn->query("SELECT * FROM orderdetail WHERE OrderID = '$OrderID'");
$back = new Order();
foreach ($order as $row) {
    $res = $back->backToBook($row['BookID'], $row['Quantity']);
}
// $res2 = $back->deleteOrderDetail($OrderID);
$res3 = $back->deleteOrder($OrderID);
if ($res && $res3) {
    echo "Huỷ đơn hàng thành công";
} else {
    echo "Huỷ đơn hàng thất bại, có lỗi xảy ra trong quá trình xử lý";
}

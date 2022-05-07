<?php
include('../class/customer.php');
$CustomerID = $_POST['deleteName'];
$cus = new Customer();
$cus = $cus->delete($CustomerID);
var_dump($CustomerID);
if ($cus) {
    echo "Xoá thành công";
} else {
    echo "Có lỗi xảy ra";
}
exit;

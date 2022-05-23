<?php
include('../class/customer.php');
error_reporting(0);
$CustomerID = $_POST['deleteName'];
$cus = new Customer();
$cus = $cus->delete($CustomerID);
if ($cus) {
    echo "Xoá thành công";
} else {
    echo "Có lỗi xảy ra";
}
exit;

<?php
include('../class/customer.php');
$CustomerID = $_POST['CustomerID'];
$cus = new Customer();
$cus = $cus->setAble($CustomerID);
if ($cus) {
    echo "Thay đổi thành công";
} else {
    echo "Có lỗi xảy ra";
}
exit;

<?php
session_start();
include('../connection.php');
$username = ($_SESSION['userId']);
$data = $_POST['data'];
$phone = $data['phone'];
$name = $data['name'];
$email = $data['email'];
$address = $data['address'];
$sql = "UPDATE customers SET PhoneNumber='$phone',FullName='$name',Address='$address',Email='$email' where CustomerID='$username'";
$result = $conn->query($sql);
if ($result) {
    echo "Thay đổi thông tin thành công";
    exit();
} else {
    echo "Có lỗi xảy ra, vui lòng thử lại";
    exit();
}

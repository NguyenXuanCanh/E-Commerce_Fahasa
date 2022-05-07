<?php
session_start();
include('../connection.php');
include('../common.php');
$username = $_SESSION['userId'];

$data = $_POST['data'];
$oldPassword = $data['oldPassword'];
$newPassword1 = $data['newPassword1'];
$newPassword2 = $data['newPassword2'];

if (!$oldPassword || !$newPassword1  || !$newPassword2) {
    echo "Vui lòng nhập đầy đủ mật khẩu.";
    exit;
}

if ($newPassword1 != $newPassword2) {
    exit("Mật khẩu không trùng khớp.");
}

$query = $conn->query("SELECT `Password` FROM customers WHERE CustomerID='$username'");
$row = mysqli_fetch_array($query);

if ($oldPassword != $row['Password']) {
    echo "Mật khẩu không đúng. Vui lòng nhập lại.";
    exit;
}

$queryChangePwd = $conn->query("UPDATE customers SET Password='$newPassword1' WHERE CustomerID='$username'");

if ($queryChangePwd) {
    echo 1;
    exit;
} else {
    exit("Có lỗi xảy ra vui lòng thử lại.");
}

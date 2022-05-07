<?php
session_start();
include('common.php');
include('connection.php');
$data = ($_POST['data']);
$username = $data['username'];
$password = $data['password'];
if (!$username || !$password) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
    exit;
}

$query = $conn->query("SELECT `CustomerID`, `Password`,`Status`,`PermissionID`,`FullName` FROM customers WHERE CustomerID='$username'");
if ($query->num_rows == 0) {
    echo "Tên đăng nhập này khong tồn tại. Vui lòng kiểm tra lại.";
    exit;
}

$row = $query->fetch_assoc();

if ($password != $row['Password']) {
    echo "Mật khẩu không đúng. Vui lòng nhập lại. ";
    exit;
}

if (!$row['Status']) {
    echo "Opps. Tài khoản này bị khóa mất rồi...";
    exit;
}

if ($row['PermissionID'] == 2) {
    echo "Tài khoản không đủ quyền để truy cập vào hệ thống.";
    exit;
}


$_SESSION['userId'] = $row['CustomerID'];
$_SESSION['username'] = $row['FullName'];

echo 1;

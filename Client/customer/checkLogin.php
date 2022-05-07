<?php
session_start();
include('../class/customer.php');

$data = $_POST['loginData'];
$id = $data['id'];
$password = $data['password'];

if (!$id || !$password) {
    echo "Vui lòng nhập đầy đủ thông tin.";
    exit;
}

$cus = new Customer();
$result = $cus->getByID($id);

if (mysqli_num_rows($result) == 0) {
    echo "Tài khoản không tồn tại.";
    exit;
}

$row = mysqli_fetch_array($result);

if ($password != $row['Password']) {
    echo "Sai mật khẩu.";
    exit;
}

if ($row['Status'] == 0) {
    echo "Tài khoản hiện đang bị khoá.";
    exit;
}

$_SESSION['userId'] = $id;
$_SESSION['username'] = $row['FullName'];

echo "";

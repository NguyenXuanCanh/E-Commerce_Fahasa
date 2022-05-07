<?php
session_start();
include('../class/customer.php');

$data = $_POST['registerData'];
$username = $data['username'];
$password = $data['password'];
$address = $data['address'];
$email = $data['email'];
$fullname = $data['fullname'];
$phone = $data['phone'];

if (empty($username) || empty($password) || empty($address) || empty($email) || empty($fullname) || empty($phone)) {
    exit('Vui lòng nhập đầy đủ thông tin!');
}

if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
    exit('Tài khoản chỉ được chứa ký tự từ a-z, 0-9 và ít nhất 6 ký tự! ');
}

$cus = new Customer();
$result = $cus->add($data);
if ($result) {
    echo true;
} else {
    echo false;
}

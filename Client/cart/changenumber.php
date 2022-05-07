<?php
session_start();

$data = $_POST['data'];
settype($data['soLuong'], "int");
$_SESSION['giohang'][$data['index']]['soluong'] = $data['soLuong'];
// echo $_SESSION['giohang'][$data['index']]['soluong'];
$gia = $_SESSION['giohang'][$data['index']]['gia'] * $_SESSION['giohang'][$data['index']]['soluong'];


if ($_SESSION['giohang']) {
    $tongtien = 0;
    foreach ($_SESSION['giohang'] as $IDProduct => $sp) {
        $tongtien += $sp['gia'] * $sp['soluong'];
    }
}

echo json_encode(array("value1" => $gia, "value2" => $tongtien));

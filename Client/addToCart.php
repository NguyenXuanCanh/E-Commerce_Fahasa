<?php
session_start();
include('./class/book.php');
$id = $_POST['BookID'];
$veg = new Book();
$getVeg = $veg->getByID($id);
$vegetable = $getVeg->fetch_assoc();

if (isset($_SESSION['giohang']) == false) $_SESSION['giohang'] = [];

$index = getIndexProduct($id);

$SLMua = $_POST['SLMua'];

if ($index != -1) {
    $key = array_search($id, array_column($_SESSION['giohang'], 'BookID'));
    $_SESSION['giohang'][$key]['soluong'] += $SLMua;
    if ($vegetable['Amount'] < $_SESSION['giohang'][$key]['soluong']) {
        $_SESSION['giohang'][$key]['soluong'] -= $SLMua;
        echo "Thêm thất bại, kho đã hết hàng bạn chọn";
        exit;
    }
} else {
    if ($vegetable['Amount'] == 0) {
        echo "Thêm thất bại, kho đã hết hàng bạn chọn";
        exit;
    }
    $vegetable['soluong'] = $SLMua;
    array_push($_SESSION['giohang'], $vegetable);
}

echo "Thêm thành công";

function getIndexProduct($id)
{
    $index = 0;
    foreach ($_SESSION['giohang'] as $IDProduct => $sp) {
        if ($sp['BookID'] == $id) return $index;
        $index++;
    }
    return -1;
}

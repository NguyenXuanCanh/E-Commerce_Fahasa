<?php
session_start();
$data = $_POST['data'];
require('../connection.php');
$bookID = $_SESSION['giohang'][$data['index']]['BookID'];
$book = $conn->query("SELECT * FROM book WHERE BookID = '$bookID'");
$book = $book->fetch_assoc();
if ($book['Amount'] < ($_SESSION['giohang'][$data['index']]['soluong'] + 1)) {
    exit;
}
$_SESSION['giohang'][$data['index']]['soluong'] += $data['cong'];
if ($_SESSION['giohang']) {
    $tongtien = 0;
    foreach ($_SESSION['giohang'] as $IDProduct => $sp) {
        $tongtien += $sp['Price'] * $sp['Discount'] * $sp['soluong'];
    }
}
echo $tongtien;

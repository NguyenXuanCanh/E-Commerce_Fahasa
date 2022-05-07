<?php
include('../connection.php');

$dateLeft = ($_POST['datePreviousInput']);
$dateRight = ($_POST['dateAfterInput']);
$dayLeft = substr($dateLeft, 0, 2);
$monthLeft = substr($dateLeft, 3, 2);
$yearLeft = substr($dateLeft, 6, 4);
$stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
$dateLeft = date('Y-m-d', strtotime($stringDateLeft));

$dayRight = substr($dateRight, 0, 2);
$monthRight = substr($dateRight, 3, 2);
$yearRight = substr($dateRight, 6, 4);
$stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
$dateRight = date('Y-m-d', strtotime($stringDateRight));

if ($dateLeft > $dateRight) {
    exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='index.php?to=5'>Chọn lại</a></h3>");
}

$sqlmadh = "SELECT OrderID,date,Total FROM orders WHERE Shipped=1";
$resmadh = $conn->query($sqlmadh);
$arrMaDH = array();
$index = 0;
$dateLeft = ($_POST['datePreviousInput']);
$dateRight = ($_POST['dateAfterInput']);

$dayLeft = substr($dateLeft, 0, 2);
$monthLeft = substr($dateLeft, 3, 2);
$yearLeft = substr($dateLeft, 6, 4);
$stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
$dateLeft = date('Y-m-d', strtotime($stringDateLeft));

$dayRight = substr($dateRight, 0, 2);
$monthRight = substr($dateRight, 3, 2);
$yearRight = substr($dateRight, 6, 4);
$stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
$dateRight = date('Y-m-d', strtotime($stringDateRight));
$total = 0;
foreach ($resmadh as $row) {
    $datetime = new DateTime($row['date']);
    $date = $datetime->format('Y-m-d');
    if ($dateLeft <= $date && $date <= $dateRight) {
        $total += $row['Total'];
        $arrMaDH[$index] = (int)($row['OrderID']);
        $index++;
    }
}
if (!$arrMaDH) {
    exit("<h3 class='text-center'>Không có sản phẩm trong thời gian đã chọn <a href='index.php?to=5'>Chọn lại</a></h3>");
}
echo $total;

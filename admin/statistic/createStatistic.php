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

$sqlmadh = "SELECT OrderID,date FROM orders WHERE Shipped=1";
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
foreach ($resmadh as $row) {
    $datetime = new DateTime($row['date']);
    $date = $datetime->format('Y-m-d');
    if ($dateLeft <= $date && $date <= $dateRight) {
        $arrMaDH[$index] = (int)($row['OrderID']);
        $index++;
    }
}
if (!$arrMaDH) {
    exit("<h3 class='text-center'>Không có sản phẩm trong thời gian đã chọn <a href='index.php?to=5'>Chọn lại</a></h3>");
}
$arrayName = array();
$arrayID = array();
$arrayValue = array();
foreach ($arrMaDH as $row) {
    $resCTDH = $conn->query("SELECT * FROM orderdetail WHERE orderid=$row");
    foreach ($resCTDH as $rowctdh) {
        $key = getIndex($rowctdh['BookID'], $arrayID);
        if ($key != -1) {
        } else {
            array_push($arrayID, $rowctdh['BookID']);
        }
    }
}
$i = 0;
foreach ($arrayID as $id) {
    $name = $conn->query("SELECT BookName,Discount FROM book WHERE BookID =$id");
    $name = $name->fetch_assoc();
    $discount = $name['Discount'];
    $name = $name['BookName'];
    $total = 0;
    foreach ($arrMaDH as $madh) {
        $ctdh = $conn->query("SELECT * FROM orderdetail,orders WHERE BookID=$id AND orderdetail.OrderID=orders.OrderID AND orders.OrderID='$madh' AND orders.Shipped=1");
        foreach ($ctdh as $row) {
            $total += $row['Quantity'] * $row['Price'];
        }
    }
    array_push($arrayName, $name);
    $arrayValue[$i] = $total;
    $i++;
}

$arrayRes = array(
    $arrayName,
    $arrayValue
);


echo (json_encode($arrayRes));

function getIndex($value, $array)
{
    $index = 0;
    foreach ($array as $item) {
        if ($value == $item) {
            return $index;
        }
        $index++;
    }
    return -1;
}

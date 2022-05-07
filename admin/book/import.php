<?php
include('../connection.php');
session_start();
$BookID = ($_POST["BookID"]);
$soLuong = $_POST['BookAmountImport'];
$moTa = $_POST['BookDesImport'];
$importResult = $conn->query("UPDATE book SET Amount=Amount+$soLuong WHERE BookID='$BookID'");
$importDate = date("Y/m/d");
$username = $_SESSION['userId'];
if ($importResult) {
    $sqlSetHistory = "INSERT INTO storagehistory (CustomerID,BookID,Amount,Description,Date) VALUES('$username',$BookID,$soLuong,'$moTa','$importDate')";
    $resultSetHistory = $conn->query($sqlSetHistory);
}
if ($resultSetHistory) {
    echo "Nhập hàng thành công";
} else {
    echo "Nhập hàng thất bại";
}

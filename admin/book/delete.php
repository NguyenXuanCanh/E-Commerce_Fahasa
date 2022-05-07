<?php
include('../connection.php');
$bookID = $_POST['BookID'];
$deleteSql = "DELETE FROM book WHERE BookID='$bookID'";
$resultDelete = $conn->query($deleteSql);
if ($resultDelete) {
    echo "Xoá thành công";
} else {
    echo "Sách đang được nằm trong một đơn hàng, không thể xoá được.";
}

<?php
session_start();
$data = $_POST['data'];
$id = $data['idProduct'];
$index = 0;
foreach ($_SESSION['giohang'] as $row) {
    if ($row['BookID'] == $id) {
        array_splice($_SESSION['giohang'], $index, 1);
    }
    $index++;
}
if (empty($_SESSION['giohang'])) {
}
echo "Xóa thành công";

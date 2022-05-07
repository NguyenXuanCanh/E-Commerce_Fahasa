<?php
include('connection.php');

$maQuyen = $_POST['PermissionID'];
$maChucNang = $_POST['FunctionID'];

$sqlCheckFill = "SELECT * FROM permissiondetail WHERE PermissionID=$maQuyen AND FunctionID=$maChucNang";

if (($conn->query($sqlCheckFill)->num_rows)) {
    $sql = "DELETE FROM permissiondetail WHERE PermissionID=$maQuyen and FunctionID = $maChucNang";
} else {
    $sql = "INSERT INTO permissiondetail(`PermissionID`,`FunctionID`) VALUES ($maQuyen,$maChucNang)";
}
$result = $conn->query($sql);
// echo $result;

<?php
class permission
{
    public function getListFunctionByPermissionID($permissionId)
    {
        include('./connection.php');
        return $conn->query("SELECT * FROM permissiondetail WHERE PermissionID = '$permissionId'");
    }
    public function getFunctionName($functionId)
    {
        include('./connection.php');
        return $conn->query("SELECT * FROM function WHERE FunctionID = '$functionId'");
    }
    public function getAllPermission()
    {
        include('./connection.php');
        return $conn->query("SELECT * FROM permission");
    }
    public function getAllFunction()
    {
        include('./connection.php');
        return $conn->query("SELECT * FROM function");
    }
}

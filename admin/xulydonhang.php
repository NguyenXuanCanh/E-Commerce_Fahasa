<?php
include('connection.php');
$idDH = $_POST['idDH'];
// var_dump($idDH);
$sql = "UPDATE orders SET Shipped=1 WHERE OrderID=$idDH";
$result = $conn->query($sql);

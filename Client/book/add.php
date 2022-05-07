<?php
$VegetableName = $_POST["BookName"];
$CategoryID = $_POST["CategoryID"];
$Unit = $_POST["Unit"];
$Amount = $_POST["Amount"];
$Price = $_POST["Price"];

$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
$duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
// Kiểm tra xem có phải file ảnh không
if ($duoi == 'jpg' || $duoi == 'png') {
    //kiểm tra độ lớn
    if ($_FILES["file"]["size"] > 2000000) {
        //tính theo byte (2mb = 2000000 bytes)
        exit("Upload fail. File is larger than 2MB.");
    }
    // add data trước khi upload hình
    include("../connection.php");
    $img = "images/" . $_FILES['file']['name'];
    $addSql = "INSERT INTO book (`BookName`, `CategoryID`, `Unit`, `Amount`, `Price`,`Image`) VALUES ('$VegetableName', '$CategoryID', '$Unit', '$Amount','$Price','$img')";
    $resultAdd = $conn->query($addSql);
    //tiến hành upload
    if (move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name'])) {
        exit("Upload success");
    } else {
        exit('Fail!');
    }
} else { // nếu không phải file ảnh
    exit('Please upload image');
}

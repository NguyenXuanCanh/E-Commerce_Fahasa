<?php
$Name = $_POST["BookName"];
$CategoryID = $_POST["theLoai"];
$PublisherID = $_POST["publish"];
$Price = $_POST["price"];
$Discount = $_POST["discount"];
$Amount = $_POST["soLuong"];
$Old = $_POST["tinhTrang"];
$duoi = explode('.', $_FILES['fileToUpload']['name']);
$duoi = $duoi[(count($duoi) - 1)];
if ($duoi == 'jpg' || $duoi == 'png') {
    if ($_FILES["fileToUpload"]["size"] > 2000000) {
        exit("Upload thất bại, ảnh phải nhỏ hơn 2MB.");
    }
    include("./connection.php");
    $img = "./images/" . $_FILES['fileToUpload']['name'];
    $addSql = "INSERT INTO book (`BookName`, `CategoryID`, `PublisherID`,`Image`, `Price`, `Amount`,`Old`,`Discount`,`Status`) VALUES ('$Name', '$CategoryID', '$PublisherID','$img','$Price', '$Amount','$Old','$Discount',1)";
    $resultAdd = $conn->query($addSql);
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../Client/images/' . $_FILES['fileToUpload']['name'])) {
        exit("Upload thành công");
    } else {
        exit('Thất bại!');
    }
} else {
    exit('Vui lòng chọn ảnh');
}

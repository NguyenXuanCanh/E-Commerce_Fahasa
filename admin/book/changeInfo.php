<?php
include("../connection.php");
$Name = $_POST["bookName"];
$CategoryID = $_POST["bookCate"];
$PublisherID = $_POST["publisher"];
$Price = $_POST["bookPrice"];
$Discount = $_POST["bookDiscount"];
$Old = $_POST["bookStatus"];
$BookID = $_POST["BookID"];
if ($_FILES["fileToUpload"]['name']) {
    $duoi = explode('.', $_FILES['fileToUpload']['name']);
    $duoi = $duoi[(count($duoi) - 1)];
    if ($duoi == 'jpg' || $duoi == 'png' || $duoi == 'jpeg') {
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            exit("Upload thất bại, ảnh phải nhỏ hơn 2MB.");
        }
        $img = "./images/" . $_FILES['fileToUpload']['name'];
        $addSql = "UPDATE book SET BookName='$Name', CategoryID= '$CategoryID', PublisherID='$PublisherID', Image= '$img', Price='$Price', Old='$Old', Discount='$Discount', Status=1 WHERE BookID='$BookID'";
        $resultAdd = $conn->query($addSql);
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../../Client/images/' . $_FILES['fileToUpload']['name'])) {
            exit("Sửa thành công");
        } else {
            exit('Sửa thất bại!');
        }
    } else {
        exit('Vui lòng chọn định dạng ảnh');
    }
} else {
    $addSql = "UPDATE book SET BookName='$Name', CategoryID= '$CategoryID', PublisherID='$PublisherID', Price='$Price', Old='$Old', Discount='$Discount', Status=1 WHERE BookID='$BookID'";
    $resultAdd = $conn->query($addSql);
    if ($resultAdd) exit("Sửa thành công");
    else exit("Có lỗi xảy ra");
}

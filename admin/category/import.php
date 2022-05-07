<?php
include('../class/category.php');
$PublisherName = $_POST['PublisherName'];
$pub = new Category();
$pub = $pub->add($PublisherName);
if ($pub) {
    echo "Thêm thành công";
} else {
    echo "Thêm thất bại";
}
exit;

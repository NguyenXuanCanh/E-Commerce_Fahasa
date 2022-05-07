<?php
include('../class/category.php');
$PublisherName = $_POST['PublisherName'];
$PublisherID = $_POST['PublisherID'];

$pub = new Category();
$pub = $pub->update($PublisherID, $PublisherName);
if ($pub) {
    echo "Sửa thành công";
    // var_dump($pub);
} else {
    echo "Sửa thất bại";
}
exit;

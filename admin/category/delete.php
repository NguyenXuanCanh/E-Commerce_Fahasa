<?php
include('../class/category.php');
$PublisherID = $_POST['PublisherID'];
$pub = new Category();
$pub = $pub->delete($PublisherID);
if ($pub) {
    echo "Xoá thành công";
} else {
    echo "Xoá thất bại, có thể một quyển sách đang có thể loại này";
}
exit;

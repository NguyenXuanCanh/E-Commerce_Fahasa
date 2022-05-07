<?php
include('../class/publisher.php');
$PublisherID = $_POST['PublisherID'];
$pub = new Publisher();
$pub = $pub->delete($PublisherID);
if ($pub) {
    echo "Xoá thành công";
} else {
    echo "Xoá thất bại, có thể một quyển sách đang trực thuộc nxb này";
}
exit;

<?php
include('../class/publisher.php');
$PublisherName = $_POST['PublisherName'];
$pub = new Publisher();
$pub = $pub->add($PublisherName);
if ($pub) {
    echo "Thêm thành công";
} else {
    echo "Thêm thất bại";
}
exit;

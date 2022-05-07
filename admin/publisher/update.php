<?php
include('../class/publisher.php');
$PublisherName = $_POST['PublisherName'];
$PublisherID = $_POST['PublisherID'];

$pub = new Publisher();
$pub = $pub->update($PublisherID, $PublisherName);
if ($pub) {
    echo "Sửa thành công";
} else {
    echo "Sửa thất bại";
}
exit;

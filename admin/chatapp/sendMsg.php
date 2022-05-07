<?php
session_start();
require_once('../connection.php');
$msg = $_POST['msg'];
$IncomingID = $_POST['IncomingID'];
$OutgoingID = $_SESSION['userId'];
// include('class/messages.php');
$date=date("Y-m-d H:i:s");
var_dump(("INSERT INTO messages (OutgoingID, IncomingID, Time, Msg) VALUES ('$OutgoingID', '$IncomingID', '$date', '$msg')"));
$mes=$conn->query("INSERT INTO messages (OutgoingID, IncomingID, Time, Msg) VALUES ('$OutgoingID', '$IncomingID', '$date', '$msg')");

if ($mes) {
    echo '';
}

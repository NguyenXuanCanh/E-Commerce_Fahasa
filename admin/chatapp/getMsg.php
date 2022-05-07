<?php
session_start();
require_once('../connection.php');
$IncomingID = $_POST['CusID'];
$OutgoingID = $_SESSION['userId'];
$mes=$conn->query("SELECT * FROM messages WHERE (OutgoingID='$OutgoingID' AND IncomingID='$IncomingID') OR (OutgoingID='$IncomingID' AND IncomingID='$OutgoingID')");
                
$output='';
foreach($mes as $row){
    if($row['IncomingID']==$OutgoingID){
        $output.='<div class="d-flex flex-row justify-content-start mb-4">';
    $output.='<div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">';
    }else{
        $output.='<div class="d-flex flex-row justify-content-end mb-4">';
    $output.='<div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(0, 0, 0,.2);">';

    }
    $output.='<p class="small mb-0">'.$row['Msg'].'</p>';
    $output.='
                </div>
                </div>
    ';
}
echo $output;
?>

<?php
session_start();
require_once('../connection.php');
$adminID=$_SESSION['userId'];
$customer=$conn->query("SELECT * FROM messages WHERE IncomingID='$adminID' GROUP BY OutgoingID");

$output='';
foreach($customer as $row){
    $cusID=$row['OutgoingID'];
    $cus=$conn->query("SELECT FullName FROM customers WHERE CustomerID='$cusID'");
    $cus=$cus->fetch_assoc();
    $output.='
    <li class="p-2 border-bottom sp-item" onclick="selectSuporter(`'.$row['OutgoingID'].'`)">
                        <a href="#!" class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                            <div>   
                              <img
                                src="../Client/images/User-avatar.svg.png"
                                alt="avatar" class="d-flex align-self-center me-3" width="60">
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1">
                              <p class="fw-bold mb-0">'.$cus['FullName'].'</p>
                              <p class="small text-muted">Xin chào, bạn có ở đó không?</p>
                            </div>
                          </div>
                          <div class="pt-1">
                            <p class="small text-muted mb-1">Vừa gửi</p>
                          </div>
                        </a>
                      </li>
    ';
}
echo $output;

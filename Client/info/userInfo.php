<?php
$id = $_SESSION["userId"];
$customer = $conn->query("SELECT * FROM customers WHERE CustomerID='$id'");
$customer = $customer->fetch_assoc();
?>
<div class="col-3 pt-3">
    <ul>
        <li>
            <label>
                Họ tên
            </label>
        </li>
        <li class="mt-3">
            <label>
                Số điện thoại
            </label>
        </li>
        <li class="mt-3">
            <label>
                Email
            </label>
        </li>
        <li class="mt-3">
            <label>
                Địa chỉ
            </label>
        </li>
    </ul>
</div>
<div class="col-5 pt-3">
    <input type="text" name="name" id="name" value="<?php
                                                    if ($customer['FullName']) {
                                                        echo ($customer['FullName']);
                                                    } else {
                                                        echo "";
                                                    } ?>" class="w-100">
    <input type="text" name="phone" id="phone" value="<?php
                                                        if ($customer['PhoneNumber']) {
                                                            echo ($customer['PhoneNumber']);
                                                        } else {
                                                            echo "";
                                                        } ?>" class="w-100 mt-3">
    <input type="text" name="email" id="email" value="<?php
                                                        if ($customer['Email']) {
                                                            echo ($customer['Email']);
                                                        } else {
                                                            echo "";
                                                        } ?>" class="w-100 mt-3">
    <input type="text" name="address" id="address" value="<?php
                                                            if ($customer['Address']) {
                                                                echo ($customer['Address']);
                                                            } else {
                                                                echo "";
                                                            } ?>" class="w-100 mt-3">
    <input type="button" data-toggle="modal" data-target="#exampleModal" class="btn mt-3 mb-3 btn-fahasa" value="Lưu thông tin">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:25%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn cập nhật chứ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thôi để xem lại</button>
                    <button type="button" onclick="saveChange()" class="btn btn-primary" style="background: #f7941e !important;
    border: 1px solid #f7941e !important;
    color: #fff !important;">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-4 pt-4 pl-5">
    <img src="./images/user.png" alt="" style="width:40%">
</div>
<script>
    function saveChange() {
        name = document.getElementById("name").value;
        phone = document.getElementById("phone").value;
        email = document.getElementById("email").value;
        address = document.getElementById("address").value;

        $.ajax({
            url: 'info/savechangeinfo.php',
            method: 'POST',
            data: {
                data: {
                    name,
                    phone,
                    email,
                    address
                }
            },
            success: function(result) {
                alert(result);
                window.location.reload();
            }
        })
    }
</script>
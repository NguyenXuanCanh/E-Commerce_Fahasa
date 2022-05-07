<?php
$listPermis = new permission();
$listPermis = $listPermis->getAllPermission();
?>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="addForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm tài khoản mới</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tài khoản (bắt buộc)</label>
                                <input class="form-control" name="Username" type="text" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email (bắt buộc)</label>
                                <input class="form-control" name="Email" type="email" required />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mật khẩu (bắt buộc)</label>
                                <input class="form-control" name="Password" type="text" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="PermissionID" class="form-control" style="height:34px">
                                    <?php foreach ($listPermis as $row) { ?>
                                        <option value=<?= $row["PermissionID"] ?>><?= $row["PermissionName"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_edit_user" aria-hidden="true" id="modal_edit_user">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="changeInfoForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control modalInput" name="updateName" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email (bắt buộc)</label>
                                <input class="form-control modalInput" name="email" type="email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control modalInput" name="password" type="password" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="permission" class="form-control" style="height:34px">
                                    <?php foreach ($listPermis as $row) { ?>
                                        <option value=<?= $row["PermissionID"] ?>><?= $row["PermissionName"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_user" aria-hidden="true" id="modal_delete_user">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="deleteForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Khoá/Mở khoá tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control modalInput" name="deleteName" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>CustomerID </label>
                                <input class="form-control modalInput" name="CustomerID" id="CustomerID" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Bạn có chắc muốn khoá/mở khoá tài khoản này</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3>
                    <i class="far fa-user"></i> Thông tin toàn bộ tài khoản
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="min-width:300px">User details</th>
                                <th style="width:120px">Role</th>
                                <th style="width:110px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('class/customer.php');
                            $cus = new Customer();
                            $cus = $cus->getUserAccounts();
                            $count = 0;
                            foreach ($cus as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="user_avatar_list d-none d-none d-lg-block"><img alt="image" src="assets/images/avatars/avatar_small.png" /></div>
                                        <h4>Tài khoản: <span class="taiKhoan" name="taikhoan"><?= $row['CustomerID'] ?></span></h4>
                                        <p>Email: <span class="email"> <?= $row['Email'] ?></span></p>
                                        <p>Địa chỉ: <span class="diaChi"><?= $row['Address'] ?></span></p>
                                        <p>Số điện thoại: <span class="soDienThoai"><?= $row['PhoneNumber'] ?></span></p>
                                    </td>
                                    <?php
                                    $idPermission = $row['PermissionID'];
                                    $sql = "SELECT PermissionName FROM permission WHERE PermissionID=$idPermission";
                                    $result = $conn->query($sql);
                                    $rowPermis = $result->fetch_assoc();
                                    ?>
                                    <td class="permission"><?= $rowPermis['PermissionName'] ?></td>
                                    <td>
                                        <span class="pull-right">
                                            <?php
                                            if ($row['Status']) {
                                            ?>
                                                <button class="btn btn-danger btn-sm mt-3" data-toggle="modal" data-target="#modal_delete_user" onclick="deleteUser('<?= $row['CustomerID'] ?>')">
                                                    <i class="fas fa-lock"></i> Khoá người dùng</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#modal_delete_user" onclick="deleteUser('<?= $row['CustomerID'] ?>')">
                                                    <i class="fas fa-lock"></i> Mở khoá</button>
                                            <?php
                                            }
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    function editUser(index) {
        let modalInput = document.getElementsByClassName("modalInput");
        let arrTaiKhoan = document.getElementsByClassName("taiKhoan");
        let arrEmail = document.getElementsByClassName("email");
        let arrDiaChi = document.getElementsByClassName("diaChi");
        let arrSoDienThoai = document.getElementsByClassName("soDienThoai");
        let arrPermission = document.getElementsByClassName("permission");
        modalInput[0].value = arrTaiKhoan[index].innerHTML;
        modalInput[1].value = arrEmail[index].innerHTML;
    }

    function deleteUser(CustomerID) {
        let modalInput = document.getElementsByClassName("modalInput");
        document.getElementById("CustomerID").value = CustomerID;
        modalInput[3].value = CustomerID;
    }
    $("#deleteForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './account/able.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
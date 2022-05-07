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
                                <label>Tài khoản</label>
                                <input class="form-control modalInput" name="CustomerID" type="text" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control modalInput" name="FullName" type="text" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control modalInput" name="Address" type="text" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control modalInput" name="Email" type="email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control modalInput" name="PhoneNumber" type="number" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="PermissionID" class="form-control modalInput" style="height:34px">
                                    <?php foreach ($listPermis as $row) { ?>
                                        <?php
                                        if ($row['PermissionID'] != 2) {
                                        ?>
                                            <option value=<?= $row["PermissionID"] ?>><?= $row["PermissionName"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control modalInput" name="Password" type="password" />
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
                                <input class="form-control modalInput" name="CustomerID" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control modalInput" name="FullName" type="text" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control modalInput" name="Address" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control modalInput" name="Email" type="email" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control modalInput" name="PhoneNumber" type="number" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="PermissionID" class="form-control modalInput" style="height:34px">
                                    <?php foreach ($listPermis as $row) { ?>
                                        <?php
                                        if ($row['PermissionID'] != 2) {
                                        ?>
                                            <option value=<?= $row["PermissionID"] ?>><?= $row["PermissionName"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control modalInput" name="Password" type="password" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            Nếu không cần thay đổi mật khẩu thì để trống ô mật khẩu
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
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_block_user" aria-hidden="true" id="modal_block_user">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="blockForm" method="post">
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
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_user" aria-hidden="true" id="modal_delete_user">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="deleteForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Xoá khoá tài khoản</h5>
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
                                <input class="form-control modalInput" id="delName" name="deleteName" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>CustomerID</label>
                                <input class="form-control modalInput" name="CustomerID" id="CustomerID" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Bạn có chắc muốn xoá khoá tài khoản này</label>
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
                <span>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user">
                        <i class="fas fa-user-plus" aria-hidden="true"></i> Thêm tài khoản</button>
                </span>
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
                            $cus = $cus->getManageAccounts();
                            $count = 0;
                            foreach ($cus as $row) { ?>
                                <tr>
                                    <td>
                                        <div class="user_avatar_list d-none d-none d-lg-block"><img alt="image" src="assets/images/avatars/avatar_small.png" /></div>
                                        <h4>Tài khoản: <span class="taiKhoan" name="taikhoan"><?= $row['CustomerID'] ?></span></h4>
                                        <p>Tên: <span class="fullname"><?= $row['FullName'] ?></span></p>
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
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user" onclick="editUser(<?= $count ?>,'<?= $row['PermissionID'] ?>')">
                                                <i class="fas fa-user-plus" aria-hidden="true"></i> Edit </button>
                                            <?php
                                            if ($row['Status']) {
                                            ?>
                                                <button class="btn btn-danger btn-sm mt-3" data-toggle="modal" data-target="#modal_block_user" onclick="blockUser('<?= $row['CustomerID'] ?>')">
                                                    <i class="fas fa-lock"></i> Khoá người dùng</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="btn btn-success btn-sm mt-3" data-toggle="modal" data-target="#modal_block_user" onclick="blockUser('<?= $row['CustomerID'] ?>')">
                                                    <i class="fas fa-lock"></i> Mở khoá</button>
                                            <?php
                                            }
                                            ?>
                                            <button class="btn btn-danger btn-sm mt-3" data-toggle="modal" data-target="#modal_delete_user" onclick="deleteUser('<?= $row['CustomerID'] ?>')">
                                                <i class="fas fa-lock"></i> Xoá người dùng</button>
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
    function editUser(index, PermissionID) {
        let modalInput = document.getElementsByClassName("modalInput");
        let arrTaiKhoan = document.getElementsByClassName("taiKhoan");
        let arrTen = document.getElementsByClassName("fullname");
        let arrEmail = document.getElementsByClassName("email");
        let arrDiaChi = document.getElementsByClassName("diaChi");
        let arrSoDienThoai = document.getElementsByClassName("soDienThoai");
        modalInput[0].value = arrTaiKhoan[index].innerHTML;
        modalInput[1].value = arrTen[index].innerHTML;
        modalInput[2].value = arrDiaChi[index].innerHTML;
        modalInput[3].value = arrEmail[index].innerHTML;
        modalInput[4].value = arrSoDienThoai[index].innerHTML;
        modalInput[5].value = PermissionID;
    }

    $("#changeInfoForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './account/changeInfo.php',
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

    $("#addForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './account/add.php',
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

    function blockUser(CustomerID) {
        let modalInput = document.getElementsByClassName("modalInput");
        document.getElementById("CustomerID").value = CustomerID;
        modalInput[7].value = CustomerID;
    }
    $("#blockForm").submit(function(e) {
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

    function deleteUser(CustomerID) {
        let delName = document.getElementById("delName");
        document.getElementById("CustomerID").value = CustomerID;
        delName.value = CustomerID;
        console.log(CustomerID)
    }

    $("#deleteForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './account/delete.php',
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
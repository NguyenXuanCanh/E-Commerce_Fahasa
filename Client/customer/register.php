<div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
    <div id="loginForm">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="login-wrap p-4 p-md-5" style="border-radius:0 0 5px 5px">
                    <form class="login-form">
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Tài khoản" name="txtUsername" id="txtUsernameRegister" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                            <input type="password" class="form-control rounded-left" placeholder="Mật khẩu" name="txtPassword" id="txtPasswordRegister" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-signature"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Tên đầy đủ" name="txtFullName" id="txtFullNameRegister" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-map-marked-alt"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Địa chỉ" name="txtAddress" id="txtAddressRegister" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-envelope"></span></div>
                            <input type="email" class="form-control rounded-left" placeholder="Email" name="txtEmail" id="txtEmailRegister" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-phone-volume"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Số điện thoại" name="txtPhone" id="txtPhoneRegister" required>
                        </div>
                        <div class="form-group d-flex align-items-center row">
                            <div class="col-12 text-danger text-center" id="textErrorRegister">
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="w-100 d-flex justify-content-center">
                                <input type="submit" class="btn btn-primary rounded submit" onclick="dangKy(event)" value="Register" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function dangKy() {
        event.preventDefault();
        let username = document.getElementById("txtUsernameRegister").value;
        let fullname = document.getElementById("txtFullNameRegister").value;
        let password = document.getElementById("txtPasswordRegister").value;
        let address = document.getElementById("txtAddressRegister").value;
        let email = document.getElementById("txtEmailRegister").value;
        let phone = document.getElementById("txtPhoneRegister").value;
        let registerData = {
            username,
            password,
            fullname,
            address,
            email,
            phone,
        }
        $.ajax({
            url: 'customer/saveRegister.php',
            method: 'POST',
            data: {
                registerData: {
                    username,
                    password,
                    fullname,
                    address,
                    email,
                    phone,
                }
            },
            success: function(result) {
                if (result == 1) {
                    document.getElementById("txtUsernameRegister").value = '';
                    document.getElementById("txtPasswordRegister").value = '';
                    document.getElementById("txtAddressRegister").value = '';
                    document.getElementById("txtAddressRegister").value = '';
                    document.getElementById("txtEmailRegister").value = '';
                    document.getElementById("txtPhoneRegister").value = '';
                    document.getElementById("txtFullNameRegister").value = '';
                    document.getElementById("textErrorRegister").classList.remove('text-danger');
                    document.getElementById("textErrorRegister").classList.add('text-success');
                    document.getElementById("textErrorRegister").innerHTML = "Đăng ký thành công.";
                } else if (result == "") {
                    document.getElementById("textErrorRegister").innerHTML = "Đăng ký thất bại, tên tài khoản đã được sử dụng.";
                } else {
                    document.getElementById("textErrorRegister").innerHTML = result;
                }
            }

        });
    }
</script>
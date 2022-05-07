<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
    <div id="loginForm">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4" style="min-width:400px">
                <div class="login-wrap p-4 p-md-5" style="border-radius:0 0 5px 5px">
                    <form class="login-form">
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-id-card"></span></div>
                            <input type="text" class="form-control rounded-left" placeholder="Tài khoản" name="txtUsername" id="txtUsername" required="">
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                            <input type="password" class="form-control rounded-left" placeholder="Mật khẩu" id="txtPassword" name="txtPassword" required="">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="w-100">
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center row">
                            <div class="col-12 text-danger text-center" id="textError">
                            </div>
                        </div>
                        <div class="form-group d-flex align-items-center row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class=" d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary rounded submit" onclick="dangNhap(event)">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function dangNhap() {
        event.preventDefault();
        let id = document.getElementById("txtUsername").value;
        let password = document.getElementById("txtPassword").value;
        $.ajax({
            url: 'customer/checkLogin.php',
            method: 'POST',
            data: {
                loginData: {
                    id,
                    password,
                }
            },
            success: function(result) {
                if (result == "") {
                    window.location.href = "index.php";
                } else {
                    document.getElementById("btnTriggerModal").click();
                    document.getElementById("modalContent").innerHTML = result;
                }
            }
        });
    }
</script>
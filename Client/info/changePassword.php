<style>
    @media (max-width:1200px) {
        ul {
            padding: 0px;
        }
    }
</style>
<div class="col-2 pt-3">
</div>
<div class="col-4 p-0">
    <img src="./images/password_lock.png" alt="">
</div>
<div class="col-6 pt-3">

    <input type="password" style="width:300px" class="d-block" id="p1" placeholder="Mật khẩu hiện tại">
    <input type="password" style="width:300px" class="d-block mt-4" placeholder="Mật khẩu mới" id="p2">
    <input type="password" style="width:300px" class="d-block mt-4" placeholder="Nhập lại mật khẩu mới" id="p3">

    <button type="button" id="modal_btn" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="top:250px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fahasa thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-danger" id="textawsome" class="textawsome"></div>
                </div>

            </div>
        </div>
    </div>
    <input type="button" class="btn mt-3 mb-3" value="Lưu thông tin" style="color: #fff !important;
    font-weight: bold;
    text-align: center;
    padding: 10px;
    border-radius: 25px;
    width: 220px;
    display: inline-block;
    background-image: linear-gradient(to right, #ff9800, #f7695d);" onclick="changePassword()">
</div>
<script>
    function reloadPage() {
        window.location.reload();
    }

    function changePassword() {
        oldPassword = document.getElementById("p1").value;
        newPassword1 = document.getElementById("p2").value;
        newPassword2 = document.getElementById("p3").value;
        $.ajax({
            url: 'info/xulydoimk.php',
            method: 'POST',
            data: {
                data: {
                    oldPassword,
                    newPassword1,
                    newPassword2,
                }
            },
            success: function(result) {
                if (result == 1) {
                    document.getElementById("modal_btn").click();
                    document.getElementById("textawsome").classList.remove("text-danger");
                    document.getElementById("textawsome").classList.add("text-success");
                    document.getElementById("textawsome").innerHTML = "Thay đổi mật khẩu thành công.";
                } else {
                    document.getElementById("modal_btn").click();
                    document.getElementById("textawsome").classList.remove("text-success");
                    document.getElementById("textawsome").classList.add("text-danger");
                    document.getElementById("textawsome").innerHTML = result;
                }
            }
        })
    }
</script>
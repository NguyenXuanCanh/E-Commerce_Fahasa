<div id="logForm"" style=" padding:200px 0px">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item bg-white text-center" style="width: 50%; border-radius:5px 0 0 0 ">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="Login" aria-selected="true">Đăng nhập</a>
                </li>
                <li class="nav-item bg-white text-center" style="width: 50%;border-radius:0 5px 0 0">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="register" aria-controls="Register" aria-selected="false">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <?php
        include('login.php');
        include('register.php');
        ?>
    </div>
</div>
</div>
<script>
    document.getElementById("headd").style.display = "none";
    document.getElementById("banners").style.display = "none";
    document.getElementById("contentt").style.display = "none";
    document.getElementById("logForm").style.height = "100%";
    document.getElementById("main").style.backgroundImage = "url(./images/download.png)";
    document.getElementById("main").style.backgroundSize = "cover";
    document.getElementById("main").style.backgroundRepeat = "no-repeat";
</script>
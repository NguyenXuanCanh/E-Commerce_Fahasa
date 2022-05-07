<style>
    .action {
        position: fixed;
    }

    .action .menu {
        background-color: #2a3542;
        color: white;
        padding: 10px;
        margin-top: 10px;
        border-radius: 15px;
        margin-right: 5px;
        min-width: 150px;
        transition: 0.5s;
        opacity: 0;
        transform: translateX(150px);
    }

    .action .menu ul {
        padding-left: 2px;
    }

    .action .menu li {
        text-align: left;
        list-style: none;
        display: block;
        padding:3px;
        text-align:center;
    }
    .action .menu li a:hover{
        color:#fb7e6d;
    }

    .action .menu li a {
        color: #fff;
        transition:0.5s;
    }

    .action .menu h3 {
        margin-top: 0px;
        text-align: center;
        font-size: 20px;
    }

    .action .menu span {
        font-size: 16px;
        color: #cecece;
        opacity:0.5;
    }

    .profile img {
        border-radius: 50%;
        cursor: pointer;
    }

    .top_menu {
        position: fixed;
        text-align: right;
        right: 8%;
    }
</style>
<div class="headerbar">
    <div class="headerbar-left">
        <a href="index.php" class="logo">
            <img alt="Logo" src="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
            <span>FAHASA ADMIN</span>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
            <li class="float-left top_menu">
                <?php
                $cusID = $_SESSION['userId'];
                $ad = $conn->query("SELECT * FROM customers WHERE CustomerID='$cusID'");
                $ad = $ad->fetch_assoc();
                $permissionId=$ad['PermissionID'];
                $permissionName=$conn->query("SELECT * FROM permission WHERE PermissionID= $permissionId");
                $permissionName=$permissionName->fetch_assoc();
                ?>
                <div class="action">
                    <div class="profile">
                        <img src="assets/images/avatars/avatar4.png" width="50px" alt="" onclick="openUmenu()">
                    </div>
                    <div class="menu" id="umenu">
                        <h3><?= $ad['FullName'] ?><br><span><?= $permissionName['PermissionName'] ?></span></h3>
                        <ul>
                            <li>
                                <a href="#" onclick="backToIndex()">Trở về trang chủ</a>
                                <!-- <i class="fas fa-home text-right"></i> -->
                            </li>
                            <li>
                                <a href="#" onclick="dangXuat()">Đăng xuất</a>
                                <!-- <i class="fas fa-sign-out-alt"></i> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
<script>
    function dangXuat() {
        $.ajax({
            url: "logout.php",
            method: "POST",
            success: function(result) {
                window.location.reload();
            }
        })
    }

    function backToIndex() {
        $.ajax({
            url: "logout.php",
            method: "POST",
            success: function(result) {
                window.location.href = '../Client';
            }
        })
    }

    function openUmenu() {
        if (document.getElementById("umenu").style.opacity == 1) {
            document.getElementById("umenu").style.transform = "translateX(150px)";
            document.getElementById("umenu").style.opacity = 0;
        } else {
            document.getElementById("umenu").style.opacity = 1;
            document.getElementById("umenu").style.transform = "translateX(0)";
        }
    }
</script>
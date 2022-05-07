<style>
    .selectedItem{
        transition: 0.4s;
    }
    .selectedItem:hover{
        /* background-color: #f7941e; */
        background-color: #F79369;
        
    }
    .selectedItem:hover a{
        color:white;
    }
</style>
<header id="headd">
    <?php
    include('common.php');
    ?>
    <div class="discountBar">
        <div class="container">
            <img class="w-100" src="./images/brd-1263x60.jpg" alt="discountImg">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="./index.php">
                <img class="fhs__logo" src="./images/fahasa-logo.png" alt="">
            </a>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input class="form-control mr-sm-2 input__zone no-outline" type="search" name="key" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="search__btn btn" style="top: 5%;
      right: 0%;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" style="margin-left:70px;">
                        <div class="nav__button pl-4" id="navNoti">
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav__button pl-3" id="navCart">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="nav-link" style="padding:0; padding-left:15px" href="#">Giỏ hàng</span>
                                <style>
                                    a.dropdown-toggle::after {
                                        display: none;
                                    }

                                    .dropdown-menu {
                                        text-transform: none;
                                        font-size: 0.8rem;

                                    }

                                    .dropdown-menu li {
                                        padding: 10px;
                                    }
                                </style>
                            </a>
                            <ul class="dropdown-menu" style="left:65%;max-width:20%; ">
                                <?php
                                $tongtien = 0;
                                $index = 0;
                                error_reporting(0);
                                if ($_SESSION['giohang']) {
                                    foreach ($_SESSION['giohang'] as $IDProduct => $sp) {
                                        $tongtien += $sp['Price'] * (1 - $sp['Discount']) * $sp['soluong'];
                                    }
                                    foreach ($_SESSION['giohang'] as $IDProduct => $sp) {
                                        if ($index >= 2) {
                                ?>
                                            <div class="text-center">...</div>
                                        <?php
                                            break;
                                        }
                                        ?>
                                        <li class="row selectedItem">
                                            <span class="col-4">
                                                <img src=<?= $sp['Image'] ?> alt="hinhAnhSP" class="w-100">
                                            </span>
                                            <span class="col-8">
                                                <div class="textProductName font-weight-bold">
                                                    <?= $sp['BookName'] ?>
                                                </div>
                                                <div class="textNumber">
                                                    <?= $sp['soluong'] ?>
                                                    x
                                                    <?= number_format($sp['Price'] * (1 - $sp['Discount']), 0, ',', '.') ?> vnd
                                                </div>
                                            </span>
                                        </li>
                                    <?php $index++;
                                    }
                                    ?>
                                    <li class="row selectedItem">
                                        <div class="col-1"></div>
                                        <span class="col-6 thanh__tien  p-0">
                                            <span class="font-weight-bold p-0" style="font-size:0.9rem">Tổng tiền: <?= number_format($tongtien, 0, ',', '.') ?> đ</span>
                                        </span>
                                        <a href="cart/index.php" class="col-4 btn text-white" style="background-color:#f7941e;">Giỏ hàng</a>
                                        <div class="col-1"></div>
                                    </li>
                                <?php
                                } else {
                                    echo "<h6 style='padding: 5px 10px; margin: 0px;font-weight: 400;'>Bạn chưa cho hàng vào giỏ.</h6>";
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isLogined()) {
                        ?>
                            <div class=" nav__button dropdown pl-3" id="navUser">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-user"></i>
                                    <span class="nav-link" style="padding:0; padding-left:15px" href="#"><?php echo ($_SESSION['username']) ?></span>
                                    <style>
                                        a.dropdown-toggle::after {
                                            display: none;
                                        }

                                        .dropdown-menu {
                                            text-transform: none;
                                            font-size: 0.8rem;

                                        }

                                        .dropdown-menu li {
                                            padding: 10px;
                                        }
                                    </style>
                                </a>
                                <ul class="dropdown-menu p-0">
                                    <li class="selectedItem"><a href="info.php?page=info">Thông tin tài khoản</a></li>
                                    <?php
                                    $cusId = $_SESSION['userId'];
                                    $cus = $conn->query("select PermissionID from customers WHERE CustomerID='$cusId'");
                                    $cus = $cus->fetch_assoc();
                                    if ($cus['PermissionID'] != 2) {
                                    ?>
                                        <li><a href="../admin">Vào trang quản lý</a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="selectedItem"><a href="#" onclick="dangXuat()">Đăng xuất</a></li>
                                </ul>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="nav__button pl-3" id="navLogin">
                                <i class="fas fa-sign-in-alt"></i>
                                <a href="./index.php?to=login">
                                    <span class="nav-link" style="padding:0; padding-left:15px">Đăng nhập</span>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script>
    function dangXuat() {
        $.ajax({
            url: "logout.php",
            method: "POST",
            data: {},
            success: function(result) {
                window.location.reload();
            }
        })
    }
</script>
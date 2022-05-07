<!doctype html>
<html lang="en">

<head>
    <title>Infomation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./images/3977825.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.css" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="main">
    <?php
    session_start();
    require('connection.php');
    include('index/header.php');
    ?>
    <style>
        .li-item {
            padding: 10px;
        }

        .li-item.active {
            background-color: #f7941e;
            border-radius: 2px;
        }

        .li-item.active {
            color: #fff !important;
        }
    </style>

    <body>
    <?php
    include('class/book.php');
    include('class/category.php');
    $cate = new Category();
    $cate = $cate->getAll();
    ?>
        
        <div class="web__content pb-4">
            <div id="flashSale" class="flash__sale container mt-4">
                <div class="flash__sale__head d-none">
                    <span class="black__title">Thông tin tài khoản</span>
                </div>
                <div class="flash__sale__content user__left p-0">
                    <div class="row">
                    <div class="flash__sale__content user__left p-0">
                    <div class="row" style="min-height: 500px;">
                    <div id="banners" class="container head__content" style="padding:10px 0px">
                    <div class="row">
                        <div class="col-4">
                            <ul class="list-group" style="border: 1px solid #f0f0f0;box-shadow: #f0f0f0 2px 4px;">
                                    <a href="?page=info">
                                    <li class="text-left li-item <?php if ($_GET["page"] == "info") echo "active" ?> ">
                                        Thông tin tài khoản
                                    </li>
                                    </a>
                                    <a href="?page=donHangUser">
                                    <li class="text-left li-item <?php if (isset(($_GET["page"])) && ($_GET["page"]) == "donHangUser") echo "active" ?>">
                                    Đơn hàng của tôi
                                
                                </li>
                                </a>
                                <a href="?page=doiPassword">
                                    <li class="text-left li-item <?php if (isset(($_GET["page"])) && ($_GET["page"]) == "doiPassword") echo "active" ?>">
                                    Đổi mật khẩu
                                    </li>
                                </a>
                                <a href="?page=wistlist">
                                    <li class="text-left li-item <?php if (isset(($_GET["page"])) && ($_GET["page"]) == "wistlist") echo "active" ?>">
                                    Các sản phẩm đã thích
                                    </li>
                                </a>
                                
                            </ul>
                        </div>
                        <div class="col-8 row">
                        <?php
                        if (($_GET["page"]) == "info") {
                            include("./info/userInfo.php");
                        } else if (($_GET["page"]) == "donHangUser") {
                            include("./info/history.php");
                        } else if (($_GET["page"]) == "doiPassword") {
                            include("./info/changePassword.php");
                        } else if (($_GET["page"]) == "wistlist") {
                            include("./info/wistlist.php");
                        }
                        if (isset($_GET["detailID"])) {
                            include("./info/detailorder.php");
                        }
                        ?>
                        </div>
                    </div>
                
            </div>
        </div>
        <?php
        include('index/footer.php');
        include('./modal.php');
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    </body>

</html>
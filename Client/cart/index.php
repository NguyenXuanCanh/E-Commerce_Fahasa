<!doctype html>
<html lang="en">

<head>
    <title>Fahasa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../images/3977825.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body id="main">
    <style>
        .card {
            margin: auto;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem
            }
        }

        .summary {
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65)
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem
            }
        }

        .summary .col-2 {
            padding: 0
        }

        .summary .col-10 {
            padding: 0
        }


        .cart select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        .cart input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        .cart input:focus::-webkit-input-placeholder {
            color: transparent
        }

        .cart .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
            margin-top: 0
        }

        .cart .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none
        }

        .cart .btn:hover {
            color: white
        }

        .cart a {
            color: black
        }

        .cart a:hover {
            color: black;
            text-decoration: none
        }

        .cart #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center
        }
    </style>
    <?php
    session_start();
    error_reporting(0);
    require('../connection.php');
    include('../class/customer.php');
    $user = new Customer();
    $user = $user->getByID($_SESSION['userId']);
    $user = $user->fetch_assoc();
    ?>
    <div class="discountBar">
        <div class="container">
            <img class="w-100" src="../images/brd-1263x60.jpg" alt="discountImg">
        </div>
    </div>
    <div class="cart pb-5" style="background-color:#f0f0f0">
        <div class="container p-0">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col">
                                    <h4><b style="color:#f7941e">Gi??? h??ng</b></h4>
                                </div>
                                <div class="col align-self-center text-right text-muted"><?= count($_SESSION['giohang']) ?> items</div>
                            </div>
                        </div>
                        <div id="tbody">
                            <?php
                            $tongTien = 0;
                            $index = 0;
                            if (isset($_SESSION['giohang'])) {
                                foreach ($_SESSION['giohang'] as $row) {
                                    $tongTien += $row['soluong'] * (1 - $row['Discount']) * $row['Price'];
                            ?>
                                    <div class="row border-bottom">
                                        <div class="row main align-items-center p-3">
                                            <div class="col-2">
                                                <img class="img-fluid" src="../<?= $row['Image'] ?>">
                                            </div>
                                            <div class="col">
                                                <div class="row"><?= $row['BookName'] ?></div>
                                            </div>
                                            <div class="col">
                                                <div class="border border text-center">
                                                    <div class="input-group">
                                                        <span class="input-group-text btn btn-danger col-4" onclick="tangGiamSoLuong(<?= $index ?>,-1)" style="padding-left:15%;"> - </span>
                                                        <input type="number" disabled name="soluong" value=<?= $row['soluong'] ?> id="soluong" class="col-4 number__quantity form-control text-center" min="1" max="100">
                                                        <span class="input-group-text btn btn-success col-4 " style="padding-left:15%;" onclick="tangGiamSoLuong(<?= $index ?>,+1)"> + </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col"><?= number_format($row['Price'] * (1 - $row['Discount']), '0', ',', '.'); ?> ??
                                                <span class="close" style="cursor:pointer;" onclick="deleteProduct(<?= $row['BookID'] ?>)">&#10005;</span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $index++;
                                }
                            }
                            ?>
                        </div>
                        <?php
                        ?>
                    </div>
                    <div class="col-md-4 summary border-left">
                        <div>
                            <h5><b>TH??NG TIN GIAO H??NG</b></h5>
                        </div>
                        <hr>
                        <form>
                            <?php
                            if ($user) {
                            ?>
                                <p>?????a ch???</p>
                                <input id="code" placeholder="" value="<?= $user['Address'] ?>" disabled>
                                <p>S??? ??i???n tho???i</p>
                                <input id="code" placeholder="" value="<?= $user['PhoneNumber'] ?>" disabled>
                            <?php
                            } else {
                            ?>
                                <p>?????a ch???</p>
                                <input id="code" placeholder="" value="" disabled>
                                <p>S??? ??i???n tho???i</p>
                                <input id="code" placeholder="" value="" disabled>
                            <?php
                            } ?>
                        </form>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">T???ng</div>
                            <div class="col text-right" id="renderTongTien"><?= number_format($tongTien, '0', ',', '.'); ?> ??</div>
                        </div>
                        <button class="btn btn-danger" onclick="thanhToan()">THANH TO??N</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footerr">
        <div class="container footer__content">
            <div class="row">
                <div class="col-4 border-right">
                    <div class="footer__left">
                        <img src="../images/fahasa-logo.png" class="w-100" alt="">
                        <p>L???u 5, 387-389 Hai B?? Tr??ng Qu???n 3 TP HCMC??ng Ty C??? Ph???n Ph??t H??nh S??ch TP HCM - FAHASA60
                            - 62 L?? L???i, Qu???n 1, TP. HCM, Vi???t Nam
                        </p>
                        <p>Fahasa.com nh???n ?????t h??ng tr???c tuy???n v?? giao h??ng t???n n??i. KH??NG h??? tr??? ?????t mua v?? nh???n
                            h??ng tr???c ti???p t???i v??n ph??ng c??ng nh?? t???t c??? H??? Th???ng Fahasa tr??n to??n qu???c.
                        </p>
                        <div align="center" style="font-size:14.5px; margin-bottom:20px; margin-top:10px; padding: 0px;text-align: left;margin-left: 10px;">
                            <a target="_blank" href="https://www.facebook.com/fahasa/" title="Facebook">
                                <img alt="Facebook" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/footer/Facebook-on.png">
                            </a>
                            <a target="_blank" href="https://www.instagram.com/fahasa_official/" title="Instagram">
                                <img alt="Instagram" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/Insta-on.png">
                            </a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCUZcVOLSxK1q6RfgzQ9-HYQ" title="Youtube">
                                <img alt="Youtube" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/Youtube-on.png">
                            </a>
                            <a target="_blank" href="https://fahasa-blog.tumblr.com/" title="Tumblr">
                                <img alt="Tumblr" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/tumblr-on.png">
                            </a>
                            <a target="_blank" href="https://twitter.com/Fahasa_com" title="Twitter">
                                <img alt="Twitter" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/twitter-on.png">
                            </a>
                            <a target="_blank" href="https://www.pinterest.com/fahasaVN/" title="Pinterest">
                                <img alt="Pinterest" src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images//footer/pinterest-on.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="footer__right">
                        <div class="row">
                            <div class="col-4">
                                <h6>D???ch v???</h6>
                                <ul>
                                    <li>
                                        <a href="#">??i???u kho???n s??? d???ng</a>
                                    </li>
                                    <li>
                                        <a href="#">Ch??nh s??ch b???o m???t</a>
                                    </li>
                                    <li>
                                        <a href="#">Gi???i thi???u Fahasa</a>
                                    </li>
                                    <li>
                                        <a href="#">H??? th???ng trung t??m - nh?? s??ch</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <h6>H??? tr???</h6>
                                <ul>
                                    <li>
                                        <a href="#">Ch??nh s??ch ?????i - tr??? - ho??n ti???n</a>
                                    </li>
                                    <li>
                                        <a href="#">Ch??nh s??ch kh??ch s???</a>
                                    </li>
                                    <li>
                                        <a href="#">Ph????ng th???c v???n chuy???n</a>
                                    </li>
                                    <li>
                                        <a href="#">Ph????ng th???c thanh to??n v?? xu???t H??</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-4">
                                <h6>T??i kho???n c???a t??i</h6>
                                <ul>
                                    <li>
                                        <a href="#">????ng nh???p/T???o m???i t??i kho???n</a>
                                    </li>
                                    <li>
                                        <a href="#">Thay ?????i ?????a ch??? kh??ch h??ng</a>
                                    </li>
                                    <li>
                                        <a href="#">Chi ti???t t??i kho???n</a>
                                    </li>
                                    <li>
                                        <a href="#">L???ch s??? mua h??ng</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h6>Li??n h???</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <i class="fa fa-map-marker-alt"></i>
                                <span>60-62 L?? L???i, Q.1, TP. HCM</span>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-envelope"></i>
                                <span>info@fahasa.com</span>
                            </div>
                            <div class="col-4">
                                <i class="fa fa-phone"></i>
                                <span>1900636467</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                - Copied from www.fahasa.com -
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <?php
    include('../modal.php');
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        document.getElementById("banners").style.display = "none";
        document.getElementById("contentt").style.display = "none";
    </script>
    <script>
        function deleteProduct(idProduct) {
            $.ajax({
                url: href = "./delete.php",
                type: "POST",
                data: {
                    data: {
                        idProduct,
                    }
                },
                success: function(result) {
                    window.location.reload();
                }
            })
        }

        function tangGiamSoLuong(index, cong) {
            let arrSoLuong = (document.getElementsByClassName("number__quantity"));
            arrSoLuong[index].value = parseInt(arrSoLuong[index].value);
            let temp = cong;
            temp += parseInt(arrSoLuong[index].value);
            if (arrSoLuong[index].value == 0 && cong == -1) return;
            document.getElementsByClassName("number__quantity")[index].value = temp;
            $.ajax({
                url: './plusone.php',
                type: 'post',
                data: {
                    data: {
                        index,
                        cong,
                    }
                },
                success: function(result) {
                    if (result == "") {
                        document.getElementById("btnTriggerModal").click();
                        document.getElementsByClassName("number__quantity")[index].value -= 1;
                        document.getElementById("modalContent").innerHTML = "S??? l?????ng v?????t qu?? s??? l?????ng h??ng trong kho";
                    } else {
                        document.getElementById("renderTongTien").innerHTML = (new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(result));
                    }
                }
            });
        }

        function thanhToan() {
            $.ajax({
                url: './saveorder.php',
                method: 'post',
                data: {
                    tongTien: <?= $tongTien ?>,
                },
                success: function(result) {
                    if (result == "") {
                        document.getElementById("btnTriggerModal").click();
                        document.getElementById("modalContent").innerHTML = "?????t h??ng th??nh c??ng";
                        document.getElementById("tbody").innerHTML = "";
                    } else if (result == "notLogin") {
                        document.getElementById("btnTriggerModal").click();
                        document.getElementById("modalContent").innerHTML = "B???n ch??a ????ng nh???p, vui l??ng ????ng nh???p tr?????c.";
                    } else {
                        document.getElementById("btnTriggerModal").click();
                        document.getElementById("modalContent").innerHTML = result;
                    }
                }
            })
        }
    </script>
</body>

</html>
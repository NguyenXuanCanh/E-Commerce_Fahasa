<?php
$bookID = $_GET['bookID'];
$book = $book->getByID($bookID);
$book = $book->fetch_assoc();
if ($book['Discount'] > 0) {
    $priceSale = ((1 - $book['Discount']) * $book['Price']);
} else $priceSale = $book['Price'];
$precentSale = $book['Discount'] * 100;
$cate = new Category();
$cate = $cate->getCateByID($bookID);
$cate = $cate->fetch_assoc();
?>
<style>
    @media (min-width: 1200px) {
        .container {
            max-width: 1300px;
        }
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .wist_btn{
        cursor: pointer;
    }
    @media (max-width:1200px) {
        .add__to__cart {
            top: 88% !important;
        }
    }

    @media (max-width:1000px) {
        footer {
            margin-top: 50px
        }
    }

    @media (max-width:780px) {
        .add__to__cart {
            top: 67% !important;
            left: -70% !important;
        }
    }
</style>
<div class="product__wrapper pt-3 ">
    <div class="product__content container pt-5 pb-5 border-bottom">
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-2 img__left pr-0">
                    </div>
                    <div class="col-9 img__right pl-0">
                        <img style="height:460px" src="<?= $book['Image'] ?>" alt="" class="w-100">
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="book__title display-4">
                        <?= $book['BookName'] ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="book__publishing__company">
                            <?php
                            $newcate = new Category();
                            $newcate = $newcate->getCateByBookID($bookID);
                            $newcate = $newcate->fetch_assoc();

                            $cateID=$newcate['CategoryID'];

                            $cateName=$conn->query("SELECT * FROM category WHERE CategoryID='$cateID'");
                            $cateName = $cateName->fetch_assoc();
                            ?>
                            <span>Thể loại: </span>
                            <span id="bookPublisingCompany"><?= $cateName['Name'] ?></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="book__author">
                            <span>Đã bán: </span>
                            <span id="bookAuthor"><?= $book['Sold'] ?></span>
                        </div>
                        
                    </div>
                </div>
                <!-- <div class="book__rate d-none" style="opacity:0;">
                    <ul class="pl-0  d-inline mr-2">
                        <li class="d-inline">
                            <img src="./images/ico_star_yellow.svg" alt="">
                        </li>
                        <li class="d-inline">
                            <img src="./images/ico_star_yellow.svg" alt="">
                        </li>
                        <li class="d-inline">
                            <img src="./images/ico_star_yellow.svg" alt="">
                        </li>
                        <li class="d-inline">
                            <img src="./images/ico_star_yellow.svg" alt="">
                        </li>
                        <li class="d-inline">
                            <img src="./images/ico_star_yellow.svg" alt="">
                        </li>
                    </ul>
                </div> -->
                <div class="row product__price mt-2">
                    <div class="col-6">
                        <span class="sale__price">
                            <?= number_format($priceSale, '0', ',', '.') ?>đ
                        </span>
                        <span class="default__price">
                            <?= number_format($book['Price'], '0', ',', '.') ?>đ
                        </span>
                        <span class="discount__percent">
                            <?= $precentSale ?>%
                        </span>
                    </div>
                    <div class="col-6 text-left">
                    <div class="wist_btn" onclick="addToWistList(<?= $book['BookID'] ?>)">
                        <?php
                        error_reporting(E_ERROR | E_PARSE);
                        session_start();
                        $bookID = $book['BookID'];
                        $customerID=$_SESSION['userId'];
                        $find=$conn->query("SELECT * FROM wistlist WHERE CustomerID='$customerID' AND BookID = '$bookID'");
                        $find=$find->fetch_assoc();
                        if($find['CustomerID']){
                           ?>
                           <svg width="24" height="20" >
                            <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="#FF424F" fill-rule="evenodd" stroke-linejoin="round" id="heartBtn"></path>
                            </svg>
                            <div id="counter" class="d-none">1</div>
                           <?php
                        }else{
                            ?>
                            <svg width="24" height="20" >
                            <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round" id="heartBtn"></path>
                            </svg>
                            <div id="counter" class="d-none">0</div>
                            <?php
                        }
                        ?>
                        Yêu thích
                    </div>
                    </div>
                    <div class="quantity mt-5">
                        <span style="font-size:1rem">Số lượng: </span>
                        <div class="d-inline box__quantity">
                            <a type="button" onclick="tangGiamSoLuong(-1)" class="btn">-</a>
                            <input style="border: none;
                                      width: 20px;text-align:center;" name="soluong" type="number" id="number__quantity" value="1">
                            <a type="button" onclick="tangGiamSoLuong(1)" class="btn">+</a>
                        </div>
                        <div class="add__to__cart" style="position: absolute;
                                left: 0;
                                top: 70%;">
                            <button class="btn" onclick="addToCart(<?= $book['BookID'] ?>)">
                                <a style="color:#f7941e">
                                    <i class="fas fa-truck"></i>
                                    Thêm vào giỏ hàng
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("banners").style.display = "none";
    document.getElementById("contentt").style.display = "none";

    function tangGiamSoLuong(cong) {
        let soLuong = Number(document.getElementById("number__quantity").value);
        soLuong += cong;
        if (soLuong == 0) return;
        document.getElementById("number__quantity").value = soLuong;
    }

    function addToCart(BookID) {
        let SLMua = document.getElementById("number__quantity").value;
        $.ajax({
            type: "POST",
            url: "./addToCart.php",
            data: {
                BookID,
                SLMua,
            },
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function addToWistList(BookID){
        if(document.getElementById("counter").innerHTML==0){
            document.getElementById("heartBtn").setAttribute("fill","#FF424F");
            document.getElementById("counter").innerHTML=1;
        }else{
            document.getElementById("counter").innerHTML=0;
            document.getElementById("heartBtn").setAttribute("fill","none");
        }
        $.ajax({
            type: "POST",
            url: "./addToWistList.php",
            data: {
                BookID,
            },
            success: function(response) {
                alert(response);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
</script>
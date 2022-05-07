<?php
include('class/book.php');
include('class/category.php');
$cate = new Category();
$cate = $cate->getAll();
?>
<div id="banners" class="container head__content" style="padding:20px 0px">
    <div class="row">
        <div class="col-4">
            <ul class="list-group">
                <a href="search.php">
                    <li class="list-group-item active text-center">
                        Danh mục sản phẩm
                    </li>
                </a>
                <?php
                $max = 6;
                foreach ($cate as $item) {
                    if ($max) {
                ?>
                        <a href="search.php?cateID=<?= $item['CategoryID'] ?>">
                            <li class="list-group-item" style="position: relative;">
                                <?= $item['Name'] ?>
                                <span>
                                    <img src="./images/right_menu.png" alt="right arrow" style="position: absolute;">
                                </span>
                            </li>
                        </a>
                <?php
                        $max--;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-8">
            <div class="carousel__banner">
                <div class="banner firstBanner">
                    <img src="./images/Banner_920x420_02.jpg" alt="fbanner" class="w-100">
                </div>
                <div class="banner secondBanner">
                    <img src="./images/moca-920x420.jpg" alt="sbanner" class="w-100">
                </div>
                <div class="banner thirdBanner">
                    <img src="./images/Zenbook-920x420.png" alt="tbanner" class="w-100">
                </div>
                <div class="banner thirdBanner">
                    <img src="./images/TrangComicManga_main_920x420.jpg" alt="fobanner" class="w-100">
                </div>
                <div class="banner thirdBanner">
                    <img src="./images/210318-brd-920x420.jpg" alt="fibanner" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container discount__banner" style="padding:20px 0px">
    <div class="row">
        <div class="col-3">
            <a href="#">
                <img src="./images/DongA-310x210.png" alt="" class="w-100">
            </a>
        </div>
        <div class="col-3">
            <a href="#">
                <img src="./images/Zenbook-310x210.png" alt="" class="w-100">
            </a>
        </div>
        <div class="col-3">
            <a href="#">
                <img src="./images/TrangVPP-DCHS.310x210.png" alt="" class="w-100">

            </a>
        </div>
        <div class="col-3">
            <a href="#">
                <img src="./images/vnpay_qrfhs2_310x210.jpg" alt="" class="w-100">

            </a>
        </div>
    </div>
</div>
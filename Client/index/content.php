<div class="web__content pb-4" id="contentt">
    <?php
    include('banners.php');
    $book = new Book();
    ?>
    <div class="icon__menu container">
        <ul class="row" style="padding-left:0">
            <li class="col-6 border-right">
                <a href="#flashSale">
                    <img src="./images/ico_flashsale.png" alt="" style="height:100px">
                    <p>Flash sale</p>
                </a>
            </li>
            <li class="col-6">
                <a href="#fahasaDeal">
                    <img src="./images/ico_PCSC_hot.png" alt="" style="height:100px">
                    <p>Phiên Chợ
                        Sách Cũ</p>
                </a>
            </li>
        </ul>
    </div>
    <div id="flashSale" class="flash__sale container mt-4">
        <div class="flash__sale__head">
            <img src="./images/ico_flashsale.png" alt="">
            <span class="black__title">Big Sale</span>
        </div>
        <div class="flash__sale__content">
            <?php
            $bookByDiscount = $book->getByAttribute('discount', 0.35);
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($bookByDiscount)) {
                if ($row['Discount'] > 0) {
                    $priceSale = (1 - $row['Discount']) * $row['Price'];
                } else $priceSale = $row['Price'];
                if ($row['Amount'] == 0) continue;
            ?>
                <a href="index.php?bookID=<?= $row['BookID'] ?>">
                    <div class="item flash__sale__item">
                        <img src="<?= $row['Image'] ?>" alt="" class="w-100">
                        <h6><?= $row['BookName'] ?></h6>
                        <div class="sale__price"><?= number_format($priceSale, '0', ',', '.') ?>đ</div>
                        <div class="default__price"><?= number_format($row['Price'], '0', ',', '.') ?>đ</div>
                        <div class="progress"><span class="progress-value" style="top:8px">Còn lại <?= $row['Amount'] ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div id="fahasaDeal" class="flash__sale container mt-4">
        <div class="flash__sale__head">
            <img src="./images/ico_PCSC_hot.png" alt="">
            <span class="black__title">Phiên chợ sách cũ</span>
        </div>
        <div class="flash__sale__content">
            <?php
            $bookOld = $book->getByAttribute('Old', 1);
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($bookOld)) {
                if ($row['Discount'] > 0) {
                    $priceSale = (1 - $row['Discount']) * $row['Price'];
                } else $priceSale = $row['Price'];
                if ($row['Amount'] == 0) continue;
            ?>
                <a href="index.php?bookID=<?= $row['BookID'] ?>">
                    <div class="item flash__sale__item">
                        <img src="<?= $row['Image'] ?>" alt="" class="w-100">
                        <h6><?= $row['BookName'] ?></h6>
                        <div class="sale__price"><?= number_format($priceSale, '0', ',', '.') ?>đ</div>
                        <div class="default__price"><?= number_format($row['Price'], '0', ',', '.') ?>đ</div>
                        <div class="progress"><span class="progress-value" style="top:8px">Còn lại <?= $row['Amount'] ?></span>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
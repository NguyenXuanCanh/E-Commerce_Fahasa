<form action="index.php?do=dhdaxl&filter=true" method="POST">
    <div class="row">
        <div class="col-4">
            <label>Từ ngày: </label>
            <div id="datePre" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="datePreInput" name="datePreInput" class="form-control" type="text" readonly />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>

        <div class="col-4">
            <label>Đến ngày: </label>
            <div id="dateAft" class="input-group date" data-date-format="dd-mm-yyyy">
                <input id="dateAftInput" name="dateAftInput" class="form-control" type="text" readonly />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary" style="margin-top:24.5px;" type="submit">Chọn</button>
        </div>
    </div>
</form>

<?php
if (isset($_GET['filter'])) {
    if ($_GET['filter']) {
        $dateLeft = ($_POST['datePreInput']);
        $dateRight = ($_POST['dateAftInput']);
        $dayLeft = substr($dateLeft, 0, 2);
        $monthLeft = substr($dateLeft, 3, 2);
        $yearLeft = substr($dateLeft, 6, 4);
        $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
        $dateLeft = date('m-d-Y', strtotime($stringDateLeft));

        $dayRight = substr($dateRight, 0, 2);
        $monthRight = substr($dateRight, 3, 2);
        $yearRight = substr($dateRight, 6, 4);
        $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
        $dateRight = date('m-d-Y', strtotime($stringDateRight));

        if ($dateLeft > $dateRight) {
            exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='index.php?do=dhdaxl'>Chọn lại</a></h3>");
        }
    }
}
?>

<h3 class="text-center">Đơn hàng đã xử lý</h3>

<?php
include('class/book.php');

$taikhoan = $_SESSION['userId'];

$sqlmadh = "SELECT OrderID,Date FROM orders WHERE Shipped=1";

$resmadh = $conn->query($sqlmadh);
$arrMaDH = array();
$index = 0;
while ($row = $resmadh->fetch_assoc()) {
    $datetime = new DateTime($row['Date']);
    if (isset($_GET['filter'])) {
        $dateLeft = ($_POST['datePreInput']);
        $dateRight = ($_POST['dateAftInput']);
        $dayLeft = substr($dateLeft, 0, 2);
        $monthLeft = substr($dateLeft, 3, 2);
        $yearLeft = substr($dateLeft, 6, 4);
        $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
        $dateLeft = date('m-d-Y', strtotime($stringDateLeft));

        $dayRight = substr($dateRight, 0, 2);
        $monthRight = substr($dateRight, 3, 2);
        $yearRight = substr($dateRight, 6, 4);
        $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
        $dateRight = date('m-d-Y', strtotime($stringDateRight));

        $datetime = new DateTime($row['Date']);
        $date = $datetime->format('m-d-Y');
        if ($dateLeft <= $date && $date <= $dateRight) {
            $arrMaDH[$index] = (int)($row['OrderID']);
            $index++;
        }
    } else {
        $arrMaDH[$index] = (int)($row['OrderID']);
        $index++;
    }
}
$arrCTDH = array();
$indexCTDH = 0;

if (!$arrMaDH) {
    exit("<h3 class='text-center'>Không có sản phẩm trong thời gian đã chọn </h3>");
}

?>
<style>
    .table td {
        border: none;
    }
</style>
<div class="row">
    <div class="col-1"></div>
    <table class="table col-10">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col" class="text-center">Mã đơn hàng</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thời điểm đặt hàng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < $index; $i++) {
                $maDH = $arrMaDH[$i];
                $sqlmactdh = "SELECT Price,BookID,Quantity FROM orderdetail WHERE OrderID='$maDH'";
                $resmactdh = $conn->query($sqlmactdh);
                $sqltongtien = "SELECT Total,Date FROM orders WHERE OrderID='$maDH'";
                $restongtien = $conn->query($sqltongtien);
                $rowTongTien = $restongtien->fetch_assoc();
            ?>
                <?php
                $isRender = false;
                $isRenderDH = false;
                $isRenderBTN = false;
                while ($row = $resmactdh->fetch_assoc()) {
                ?>
                    <tr style="margin-top: 10px;">
                        <td><?php if (!$isRender) {
                                echo $i + 1;
                                $isRender = "true";
                            } ?></td>
                        <?php
                        $book = new Book();
                        $book = $book->getByID($row['BookID']);
                        $book = $book->fetch_assoc();
                        ?>
                        <td class="text-center font-weight-bold">
                            <?php if (!$isRenderDH) {
                                echo $maDH;
                                $isRenderDH = "true";
                            } ?>
                        <td>
                            <img src="../Client/<?= $book['Image'] ?>" style="max-width:100px" alt="">
                        </td>
                        <td>
                            <?= $book['BookName'] ?>
                        </td>
                        <td>
                            <?= $row['Quantity'] ?>
                        </td>
                        <td>
                            <?php
                            echo $rowTongTien['Date'];
                            ?>
                        </td>
                        <td class=" pt-0 pb-3" style="font-weight:bold">
                            <?php if (!$isRenderBTN) {
                            ?>
                                <a class="" href="index.php?orderdetail=<?= $maDH ?>"><button type="submit" class="btn btn-primary mt-4">Xem chi tiết đơn hàng</button></a>
                            <?php
                                $isRenderBTN = "true";
                            } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr style="border-bottom:1px solid #f0f0f0;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right pt-0 pb-3" style="font-weight:bold">
                    </td>
                    <td></td>
                    <td class="text-right pt-0 pb-3" style="font-weight:bold">
                        <h4>Tổng tiền:</h4>
                    </td>
                    <td class="pt-0 pb-3" style="font-weight:bold">
                        <h4><?= number_format($rowTongTien['Total'], 0, ',', '.') ?> đ</h4>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
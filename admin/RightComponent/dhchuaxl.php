<form action="index.php?do=dhchuaxl&filter=true" method="POST">
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
            exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='index.php?do=dhchuaxl'>Chọn lại</a></h3>");
        }
    }
}
?>
<h3 class="text-center">Đơn hàng chưa xử lý</h3>

<?php
$taikhoan = $_SESSION['userId'];
$sqlmadh = "SELECT OrderID,Date FROM orders WHERE Shipped=0";

$resmadh = $conn->query($sqlmadh);
$arrMaDH = array();
$index = 0;
include('class/book.php');
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
// var_dump($index);
$arrCTDH = array();
$indexCTDH = 0;
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
            <tr class="row">
                <th class="col-1">STT</th>
                <th class="col-1">Mã đơn hàng</th>
                <th class="col-2">Hình ảnh</th>
                <th class="col-2">Tên SP</th>
                <th class="col-1">Số lượng</th>
                <th class="col-2">Thời điểm đặt hàng</th>
                <th class="col-3">Thao tác</th>
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
                    <tr class="row" style="margin-top: 10px;">
                        <td class="col-1"><?php if (!$isRender) {
                                                echo $i + 1;
                                                $isRender = "true";
                                            } ?></td>
                        <?php
                        $book = new Book();
                        $book = $book->getByID($row['BookID']);
                        $book = $book->fetch_assoc();
                        ?>
                        <td class="text-center font-weight-bold col-1">
                            <?php if (!$isRenderDH) {
                                echo $maDH;
                                $isRenderDH = "true";
                            } ?>
                        <td class="col-2">
                            <img src="../Client/<?= $book['Image'] ?>" style="max-width:100px" alt="">
                        </td>
                        <td class="col-2">
                            <?= $book['BookName'] ?>
                        </td>
                        <td class="col-1">
                            <?= $row['Quantity'] ?>
                        </td>
                        <td class="col-2">
                            <?php
                            echo $rowTongTien['Date'];
                            ?>
                        </td>
                        <td class=" pt-0 pb-3 col-3" style="font-weight:bold">
                            <?php if (!$isRenderBTN) {
                            ?>
                                <button type="submit" class="btn btn-success " onclick="xulydonhang(<?= $maDH ?>)">Đã xử lý đơn hàng</button>
                                <a class="" href="index.php?orderdetail=<?= $maDH ?>">
                                    <button type="submit" class="btn btn-primary">Xem chi tiết đơn hàng</button>
                                </a>
                                <button type="submit" class="btn btn-danger mt-2" onclick="huyDonHang(<?= $maDH ?>)">Huỷ đơn hàng</button>
                            <?php
                                $isRenderBTN = "true";
                            } ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr class="row" style="border-bottom:1px solid #f0f0f0;">
                    <td class="col-9"></td>
                    <td class="text-right pt-0 pb-3" style="font-weight:bold">
                        <h4>Tổng tiền:</h4>
                    </td>
                    <td class="pt-0 pb-3" style="font-weight:bold">
                        <h4>
                            <?= number_format($rowTongTien['Total'], 0, ',', '.') ?> đ
                        </h4>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    function huyDonHang(OrderID) {
        $.ajax({
            url: 'order/huydonhang.php',
            method: 'POST',
            data: {
                OrderID
            },
            success: function(result) {
                alert(result);
                window.location.reload();
            }
        })
    }
</script>
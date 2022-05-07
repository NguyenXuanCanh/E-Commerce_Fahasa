<div class="row">
    <div class="col-1"></div>
    <table class="table col-10">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thời điểm đặt hàng</th>
                <th scope="col">Tài khoản đặt mua</th>
                <th scope="col">Tên người mua</th>
                <th scope="col">Thông tin liên hệ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $maDH = $_GET['orderdetail'];
            $sqlmactdh = "SELECT OrderID,orderdetail.BookID,Quantity,book.Price,BookName,Image FROM orderdetail,book WHERE OrderID='$maDH' AND orderdetail.BookID=book.BookID";
            $resmactdh = $conn->query($sqlmactdh);
            $sqltongtien = "SELECT Total,Date,customers.FullName,Email,customers.CustomerID,PhoneNumber,Address FROM orders,customers WHERE OrderID='$maDH' AND customers.CustomerID=orders.CustomerID";
            $restongtien = $conn->query($sqltongtien);
            $rowTongTien = $restongtien->fetch_assoc();
            ?>
            <?php
            $isRender = false;
            $i = 0;
            while ($row = $resmactdh->fetch_assoc()) {
            ?>
                <a href="#">
                    <tr>
                        <td><?php if (!$isRender) {
                                echo $i + 1;
                                $isRender = "true";
                            } ?></td>
                        <td>
                            <img src="../Client/<?= $row['Image'] ?>" style="max-width:100px" alt="">
                        </td>
                        <td>
                            <?= $row['BookID'] ?>
                        </td>
                        <td>
                            <?= $row['Quantity'] ?>
                        </td>
                        <td>
                            <?= $rowTongTien['Date'] ?>
                        </td>
                        <td>
                            <?= $rowTongTien['CustomerID'] ?>
                        </td>
                        <td>
                            <?= $rowTongTien['FullName'] ?>
                        </td>
                        <td>
                            <label>Số điện thoại: </label><?= $rowTongTien['PhoneNumber'] ?><br>
                            <label>Địa chỉ: </label><?= $rowTongTien['Address'] ?><br>
                            <label>Email: </label><?= $rowTongTien['Email'] ?>
                        </td>
                    </tr>
                </a>
            <?php
                $i++;
            }
            ?>
            <tr>
                <td></td>
                <td>
                </td>
                <td class="text-right pt-0 pb-3" style="font-weight:bold">
                </td>
                <td></td>
                <td></td>
                <td></td>

                <td class="text-right pt-0 pb-3" style="font-weight:bold">
                    Tổng tiền:
                </td>
                <td class="pt-0 pb-3" style="font-weight:bold">
                    <?= number_format($rowTongTien['Total'], 0, ',', '.') ?> đ
                </td>
            </tr>
            <?php
            ?>
        </tbody>
    </table>
</div>
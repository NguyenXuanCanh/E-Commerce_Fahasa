<?php
include('./class/order.php');
?>
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #f7941e;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #f7941e;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #f7941e;
    }

    .styled-table tbody tr.del-row {
        font-weight: bold;
        background-color: #dc3545;
        color: white;
    }
</style>
<div style="width:100%;">
    <table class="styled-table" style="margin-top: 0px;">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order = new Order();
            $orderById = $order->getAllOrder($_SESSION['userId']);
            foreach ($orderById as $row) {
                if ($row['Shipped'] == 1) {
            ?>
                    <tr class="active-row">
                    <?php
                } else if ($row['Shipped'] == 0) {
                    ?>
                    <tr>
                    <?php
                } else {
                    ?>
                    <tr class="del-row">
                    <?php
                }
                    ?>
                    <th scope="row"><?= $row['OrderID'] ?></th>
                    <td><?= $row['Date'] ?></td>
                    <td><?= number_format($row['Total'], '0', ',', '.'); ?> vnd</td>
                    <td>
                        <?php
                        if ($row['Shipped'] == 1) {
                        ?>
                            Đã xác nhận
                        <?php
                        } else if ($row['Shipped'] == 0) {
                        ?>
                            Chưa xác nhận
                        <?php
                        } else {
                        ?>
                            Đã hủy
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-fahasa" style="width:70%">
                            <a href="info.php?detailID=<?= $row['OrderID'] ?>" class="text-white">Chi tiết</a>
                        </button>
                    </td>
                    </tr>
                <?php
            }
                ?>
        </tbody>
    </table>
</div>
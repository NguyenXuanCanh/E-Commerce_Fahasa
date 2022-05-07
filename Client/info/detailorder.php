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
</style>
<div class="container">
    <!-- <h5>Chi tiết đơn hàng</h5> -->
    <table class="styled-table m-0">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('./class/order.php');
            // include('./class/book.php');
            $orderID = $_GET['detailID'];
            $order = new Order();
            $Vegeta = new Book();
            $orderDetailById = $order->getOrderDetail($orderID);
            $loop = false;
            foreach ($orderDetailById as $row) {
                $getVeg = $Vegeta->getByID($row['BookID']);
                $vegetable = $getVeg->fetch_assoc();
            ?>
                <tr>
                    <th scope="row">
                        <?php
                        if (!$loop) {
                        ?>
                            <?= $row['OrderID'] ?>
                        <?php
                            $loop = true;
                        }
                        ?>
                    </th>
                    <td><?= $vegetable['BookName'] ?></td>
                    <td><img src="<?= $vegetable['Image'] ?>" style="height:150px" alt=""></td>
                    <td><?= $row['Quantity'] ?> </td>
                    <td><?= number_format($row['Price'], '0', ',', '.'); ?> vnd</td>
                </tr>
            <?php
            }
            $getOrderById = $order->getOrderByID($orderID);
            $getOrder = $getOrderById->fetch_assoc();
            ?>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td>
                    <?php
                    if (!$getOrder['Shipped']) {
                    ?>
                        <button class="btn btn-danger" style="height:50%">
                            <a href="#" class="text-white" onclick="huydonhang('<?= $orderID ?>')">Huỷ đơn hàng</a>
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td><?= number_format($getOrder['Total'], '0', ',', '.'); ?> vnd</td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    function huydonhang(OrderID) {
        $.ajax({
            url: 'info/huydonhang.php',
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
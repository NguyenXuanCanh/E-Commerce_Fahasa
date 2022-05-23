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
<div class="container">
    <table class="styled-table m-0">
        <thead>
            <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $customerID=$_SESSION['userId'];
            $bookByCusID = $conn->query("SELECT BookName, Image, Price, book.BookID FROM wistlist, book WHERE CustomerID='$customerID' AND wistlist.BookID=book.BookID");
            foreach ($bookByCusID as $row) {
            ?>
                <tr>
                    <td>
                        <a href="./index.php?bookID=<?=$row['BookID']?>">
                            <?= $row['BookName'] ?>
                        </a>
                    </td>
                    <td>
                        <a href="./index.php?bookID=<?=$row['BookID']?>">
                        <img src="<?= $row['Image'] ?>" style="height:150px" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="./index.php?bookID=<?=$row['BookID']?>">
                        <?= number_format($row['Price'], '0', ',', '.'); ?> vnd
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
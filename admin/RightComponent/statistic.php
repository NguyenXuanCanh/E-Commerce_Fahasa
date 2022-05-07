<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="row" id="divtofade" style="min-height:130px;">
                <h3 class="text-center mt-4 col-10">
                    Thống kê số đơn hàng được đặt qua từng tháng(2021)
                </h3>
                <div class="mt-3 col-2">
                    <button class="btn btn-primary" onclick="triggerStatistic()">Thống kê</button>
                </div>
            </div>
            <table id="column-example-3" style="display: none" class="charts-css column show-labels show-primary-axis datasets-spacing-1">
                <?php
                $arrdonhangmoithang = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                $sqltkdh = "SELECT date FROM orders";
                $resulttkdh = $conn->query($sqltkdh);
                foreach ($resulttkdh as $rowtkdh) {
                    $datetime = new DateTime($rowtkdh['date']);
                    $month = $datetime->format('m');
                    settype($month, 'int');
                    switch ($month) {
                        case 1: {
                                $arrdonhangmoithang[0]++;
                                break;
                            }
                        case 2: {
                                $arrdonhangmoithang[1]++;
                                break;
                            }
                        case 3: {
                                $arrdonhangmoithang[2]++;
                                break;
                            }
                        case 4: {
                                $arrdonhangmoithang[3]++;
                                break;
                            }
                        case 5: {
                                $arrdonhangmoithang[4]++;
                                break;
                            }
                        case 6: {
                                $arrdonhangmoithang[5]++;
                                break;
                            }
                        case 7: {
                                $arrdonhangmoithang[6]++;
                                break;
                            }
                        case 8: {
                                $arrdonhangmoithang[7]++;
                                break;
                            }
                        case 9: {
                                $arrdonhangmoithang[8]++;
                                break;
                            }
                        case 10: {
                                $arrdonhangmoithang[9]++;
                                break;
                            }
                        case 11: {
                                $arrdonhangmoithang[10]++;
                                break;
                            }
                        case 12: {
                                $arrdonhangmoithang[11]++;
                                break;
                            }
                    }
                }
                ?>
                <thead>
                    <tr>
                        <th scope="col"> Month </th>
                        <th scope="col"> Progress </th>
                    </tr>
                </thead>
                <tbody style="min-height:559px">
                    <tr>
                        <th scope="row"> 1 </th>
                        <td style="--size:<?= $arrdonhangmoithang[0] / 10 ?>;"><?php if ($arrdonhangmoithang[0]) echo $arrdonhangmoithang[0] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 2 </th>
                        <td style="--size:<?= $arrdonhangmoithang[1] / 10 ?>;;"><?php if ($arrdonhangmoithang[1]) echo $arrdonhangmoithang[1] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 3 </th>
                        <td style="--size:<?= $arrdonhangmoithang[2] / 10 ?>;;"><?php if ($arrdonhangmoithang[2]) echo $arrdonhangmoithang[2] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 4 </th>
                        <td style="--size:<?= $arrdonhangmoithang[3] / 10 ?>;;"><?php if ($arrdonhangmoithang[3]) echo $arrdonhangmoithang[3] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 5 </th>
                        <td style="--size:<?= $arrdonhangmoithang[4] / 10 ?>;;"><?php if ($arrdonhangmoithang[4]) echo $arrdonhangmoithang[4] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 6 </th>
                        <td style="--size:<?= $arrdonhangmoithang[5] / 10 ?>;;"><?php if ($arrdonhangmoithang[5]) echo $arrdonhangmoithang[5] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 7 </th>
                        <td style="--size:<?= $arrdonhangmoithang[6] / 10 ?>;;"><?php if ($arrdonhangmoithang[6]) echo $arrdonhangmoithang[6] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 8 </th>
                        <td style="--size:<?= $arrdonhangmoithang[7] / 10 ?>;;"><?php if ($arrdonhangmoithang[7]) echo $arrdonhangmoithang[7] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 9 </th>
                        <td style="--size:<?= $arrdonhangmoithang[8] / 10 ?>;;"><?php if ($arrdonhangmoithang[8]) echo $arrdonhangmoithang[8] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 10 </th>
                        <td style="--size:<?= $arrdonhangmoithang[9] / 10 ?>;;"><?php if ($arrdonhangmoithang[9]) echo $arrdonhangmoithang[9] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 11 </th>
                        <td style="--size:<?= $arrdonhangmoithang[10] / 10 ?>;;"><?php if ($arrdonhangmoithang[10]) echo $arrdonhangmoithang[10] ?></td>
                    </tr>
                    <tr>
                        <th scope="row"> 12 </th>
                        <td style="--size:<?= $arrdonhangmoithang[11] / 10 ?>;;"><?php if ($arrdonhangmoithang[11]) echo $arrdonhangmoithang[11] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3" style="min-height:130px;">
            <table id="column-example-14" class="charts-css column show-labels show-primary-axis ">
                <h3 class="text-center mt-4">Top sản phẩm được mua nhiều nhất trong khoảng thời gian</h3>
                <form action="index.php?to=5&filter" method="POST">
                    <div class="row">
                        <div class="col-1"></div>
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
                    $dateLeft = ($_POST['datePreInput']);
                    $dateRight = ($_POST['dateAftInput']);
                    $dayLeft = substr($dateLeft, 0, 2);
                    $monthLeft = substr($dateLeft, 3, 2);
                    $yearLeft = substr($dateLeft, 6, 4);
                    $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
                    $dateLeft = date('Y-m-d', strtotime($stringDateLeft));

                    $dayRight = substr($dateRight, 0, 2);
                    $monthRight = substr($dateRight, 3, 2);
                    $yearRight = substr($dateRight, 6, 4);
                    $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
                    $dateRight = date('Y-m-d', strtotime($stringDateRight));

                    if ($dateLeft > $dateRight) {
                        exit("<h3 class='text-center'>Vui lòng chọn ngày hợp lệ <a href='index.php?to=5'>Chọn lại</a></h3>");
                    }
                }
                if (isset($_GET['filter'])) {
                    $sqlmadh = "SELECT OrderID,date FROM orders";
                    $resmadh = $conn->query($sqlmadh);
                    $arrMaDH = array();
                    $index = 0;
                    $dateLeft = ($_POST['datePreInput']);
                    $dateRight = ($_POST['dateAftInput']);
                    $dayLeft = substr($dateLeft, 0, 2);
                    $monthLeft = substr($dateLeft, 3, 2);
                    $yearLeft = substr($dateLeft, 6, 4);
                    $stringDateLeft = $dayLeft . '-' . $monthLeft . '-' . $yearLeft;
                    $dateLeft = date('Y-m-d', strtotime($stringDateLeft));

                    $dayRight = substr($dateRight, 0, 2);
                    $monthRight = substr($dateRight, 3, 2);
                    $yearRight = substr($dateRight, 6, 4);
                    $stringDateRight = $dayRight . '-' . $monthRight . '-' . $yearRight;
                    $dateRight = date('Y-m-d', strtotime($stringDateRight));
                    foreach ($resmadh as $row) {
                        $datetime = new DateTime($row['date']);
                        $date = $datetime->format('Y-m-d');
                        if ($dateLeft <= $date && $date <= $dateRight) {
                            $arrMaDH[$index] = (int)($row['OrderID']);
                            $index++;
                        }
                    }
                    if (!$arrMaDH) {
                        exit("<h3 class='text-center'>Không có sản phẩm trong thời gian đã chọn <a href='index.php?to=5'>Chọn lại</a></h3>");
                    }
                    $gioHang = array();
                    $arrCTDH = array();
                    $indexCTDH = 0;
                    for ($i = 0; $i < $index; $i++) {
                        $maDH = $arrMaDH[$i];
                        $sqlmactdh = "SELECT Quantity,BookID FROM orderdetail WHERE OrderID='$maDH'";
                        $resmactdh = $conn->query($sqlmactdh);
                        foreach ($resmactdh as $rowctdh) {
                            $idProduct = $rowctdh['BookID'];
                            $soLuong = $rowctdh['Quantity'];
                            $isInArr = false;
                            for ($k = 0; $k < count($gioHang); $k++) {
                                if ($idProduct == $gioHang[$k]['BookID']) {
                                    $isInArr = true;
                                    $gioHang[$k]['Quantity'] += $soLuong;
                                }
                            }
                            if (!$isInArr) {
                                array_push($gioHang, [
                                    'BookID' => $idProduct,
                                    'Quantity' => $soLuong,
                                ]);
                            }
                        }
                    }

                    $first = [
                        'BookID' => 0,
                        'Quantity' => 0,
                    ];
                    $second = [
                        'BookID' => 0,
                        'Quantity' => 0,

                    ];
                    $third = [
                        'BookID' => 0,
                        'Quantity' => 0,
                    ];
                    for ($j = 0; $j < count($gioHang); $j++) {
                        if ($gioHang[$j]['Quantity'] > $first['Quantity']) {
                            $third = $second;
                            $second = $first;
                            $first = $gioHang[$j];
                        } else if ($gioHang[$j]['Quantity'] > $second['Quantity']) {
                            $third = $second;
                            $second = $gioHang[$j];
                        } else if ($gioHang[$j]['Quantity'] > $third['Quantity']) {
                            $third = $gioHang[$j];
                        }
                    }
                ?>
                    <thead>
                        <tr>
                            <th scope="col"> Year </th>
                            <th scope="col"> Progress </th>
                        </tr>
                    </thead>
                    <tbody style="min-height:500px; width:80%; margin-left:10%;">
                        <tr>
                            <?php
                            include('class/book.php');
                            $book = new Book();
                            $book = $book->getByID($third['BookID']);
                            $book = $book->fetch_assoc();
                            ?>
                            <th scope="row"> III </th>
                            <td style="--size:<? if ($third) {
                                                    echo $third['Quantity'] / $first['Quantity'];
                                                }
                                                ?>;"><?php if ($book) echo "<div class='text-center font-weight-bold'>" . $book['BookName'] . "</div>" ?> </td>
                        </tr>
                        <tr>
                            <?php
                            $book = new Book();
                            $book = $book->getByID($first['BookID']);
                            $book = $book->fetch_assoc();
                            ?>
                            <th scope="row"> I </th>
                            <td style="--size:1;"><?php echo "<div class='text-center font-weight-bold'>" . $book['BookName'] . "</div>" ?></td>
                        </tr>
                        <tr>
                            <?php
                            $book = new Book();
                            $book = $book->getByID($second['BookID']);
                            $book = $book->fetch_assoc();
                            ?>
                            <th scope="row"> II </th>
                            <td style="--size:<? if ($second) echo $second['Quantity'] / $first['Quantity']; ?>;">
                                <?php if ($book) echo "<div class='text-center font-weight-bold'>" . $book['BookName'] . "</div>" ?></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <h3 class="text-center mt-4" id="totalMoney">Thống kê doanh thu đạt được trong khoảng thời gian</h3>
            <form id="form" method="POST">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-4">
                        <label>Từ ngày: </label>
                        <div id="datePrevious" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input id="datePreviousInput" name="datePreviousInput" class="form-control" type="text" readonly />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Đến ngày: </label>
                        <div id="dateAfter" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input id="dateAfterInput" name="dateAfterInput" class="form-control" type="text" readonly />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" style="margin-top:24.5px;" type="submit">Chọn</button>
                    </div>
                </div>
            </form>
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</script>
<script>
    function triggerStatistic() {
        document.getElementById("column-example-3").style.display = "block";
    }
    $("#form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './statistic/getTotal.php',
            type: 'POST',
            data: formData,
            success: function(res) {
                $.ajax({
                    url: './statistic/createStatistic.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        arrayRes = (jQuery.parseJSON(response));
                        var xValues = arrayRes[0];
                        var yValues = arrayRes[1];
                        var barColors = [
                            "#b91d47",
                            "#00aba9",
                            "#2b5797",
                            "#e8c3b9",
                            "#1e7145",
                            "#eb6434",
                            "#ebd634",
                            "#68eb34",
                            "#34eb96",
                            "#3462eb",
                        ];
                        res = (new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(res));
                        new Chart("myChart", {
                            type: "pie",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: yValues
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    text: "Tổng doanh thu trong thời gian được chọn là: " + res,
                                }
                            }
                        });
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
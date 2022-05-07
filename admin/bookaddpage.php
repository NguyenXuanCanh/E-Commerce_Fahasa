<?php
session_start();
include('common.php');
include('connection.php');
$isValid = false;
if (isset($_SESSION['userId'])) {
    $username = $_SESSION['userId'];
    $sql = "SELECT * FROM Customers WHERE CustomerID='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['PermissionID'] != 4) {
        $isValid = true;
    }
}
if ($isValid) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Fahasa Admin - Trang chính</title>
        <meta name="description" content="Dashboard | Nura Admin">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Your website">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
        <link href="assets/font-awesome/css/all.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/chart.js/Chart.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <style>
            .headerbar-left a {
                font-size: 2rem !important;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }

            .submenu span {
                font-size: 1.5rem !important;
            }

            label {
                margin-left: 20px;
            }

            .table td {
                border: none !important;
            }

            form input:hover {
                cursor: pointer !important;
            }

            #datePre:hover,
            #dateAft:hover {
                cursor: pointer;
            }
        </style>
    </head>

    <body class="adminbody">
        <div id="main">
            <?php include('TopComponent/header.php');
            include('modal.php') ?>
            <div class="content-page ml-0">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Thêm sách</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Trang chính</li>
                                        <li class="breadcrumb-item"><a href="blog.php">Sách</a></li>
                                        <li class="breadcrumb-item active">Thêm sách</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3 p-3">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" id="data">
                                            <div class="row">
                                                <div class="form-group col-xl-6 col-md-8 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tên sách</label>
                                                        <input class="form-control" name="BookName" type="text" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Thể loại</label>
                                                        <select name="theLoai" class="form-control" style="height:34px">
                                                            <option value="" selected disabled hidden> - select -</option>
                                                            <?php
                                                            include('class/category.php');
                                                            $cate = new Category();
                                                            $cate = $cate->getAll();
                                                            foreach ($cate as $row) {
                                                            ?>
                                                                <option value=<?= $row['CategoryID'] ?>><?= $row["Name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nhà xuất bản</label>
                                                        <select name="publish" class="form-control" style="height:34px">
                                                            <option value="" selected disabled hidden> - select -</option>
                                                            <?php
                                                            $publish = $conn->query("SELECT * FROM publisher");
                                                            foreach ($publish as $row) {
                                                            ?>
                                                                <option value=<?= $row['PublisherID'] ?>><?= $row["PublisherName"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hình ảnh</label><br />
                                                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Thêm sách" id="but_upload">
                                                    </div>
                                                </div>
                                                <div class="form-group col-xl-6 col-md-4 col-sm-12 border-left">
                                                    <div class="form-group">
                                                        <label>Giá</label>
                                                        <input type="text" class="form-control" name="price" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giảm giá (nhập số từ 0-1) </label>
                                                        <input type="text" class="form-control" name="discount" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số lượng</label>
                                                        <input type="text" class="form-control" name="soLuong" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tình trạng</label>
                                                        <select name="tinhTrang" class="form-control" required style="height:34px">
                                                            <option value="" selected disabled hidden>- select -</option>
                                                            <option value="0">Mới</option>
                                                            <option value="1">Cũ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <span class="text-right">
                    Copyright <a target="_blank" href="#">Your Company</a>
                </span>
                <span class="float-right">
                    Powered by <a target="_blank" href="https://bootstrap24.com" title="Download free Bootstrap templates"><b>Bootstrap24.com</b></a>
                </span>
            </footer>
            <script src="assets/js/admin.js"></script>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
            $("form#data").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: './addbook.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        document.getElementById("btnTriggerModal").click();
                        document.getElementById("modalContent").innerHTML = response;
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        </script>
    </body>

    </html>
<?php
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Đăng nhập admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body>
        <h1 class="text-center">ĐĂNG NHẬP ADMIN</h1>
        <div class="text-center">
            <div>Tại sao bạn lại nhìn thấy trang này</div>
            <div>1. Do bạn chưa đăng nhập</div>
            <div>2. Do tài khoản của bạn không đủ quyền để truy cập vào hệ thống</div>
            <div>3. Do tài bạn truy cập nhầm đường dẫn</div>
            <div><a href="../Client/index.php" style="color:blue">Trở về trang chủ</a></div>
        </div>
        <div id="loginZone" class="login__zone" style="margin-top: 50px;">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item bg-white text-center" style="width: 50%; border-radius:5px 0 0 0 ">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="Đăng nhập" aria-selected="true">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div id="loginForm">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <div class="login-wrap p-4 p-md-5" style="border-radius:0 0 5px 5px">
                                    <form class="login-form">
                                        <div class="form-group">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                                            <input type="text" class="form-control rounded-left" placeholder="Username" id="txtUsername" name="txtUsername" required="">
                                        </div>
                                        <div class="form-group">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                            <input type="password" class="form-control rounded-left" placeholder="Password" id="txtPassword" name="txtPassword" required="">
                                        </div>
                                        <div class="form-group d-flex align-items-center row">
                                            <div class="col-12 text-danger text-center" id="textError">

                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center row">
                                            <div class="col-4"></div>
                                            <div class="col-4">
                                                <div class=" d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary rounded" onclick="dangNhap(event)">Đăng nhập</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
            function dangNhap() {
                event.preventDefault();
                username = document.getElementById("txtUsername").value;
                password = document.getElementById("txtPassword").value;
                $.ajax({
                    url: "checklogin.php",
                    method: "POST",
                    data: {
                        data: {
                            username,
                            password,
                        }
                    },
                    success: function(result) {
                        if (result == 1) {
                            window.location.reload();
                        } else {
                            document.getElementById("textError").innerHTML = result;
                        }
                    }
                })
            }
        </script>
    </body>

    </html>
<?php
}
?>
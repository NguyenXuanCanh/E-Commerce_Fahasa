<?php
session_start();
include('connection.php');
$isValid = true;
if (isset($_SESSION['userId'])) {
    $username = $_SESSION['userId'];
    $sql = "SELECT * FROM Customers WHERE CustomerID='$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['PermissionID'] != 2) {
        $isValid = false;
    }
}
if ($isValid) {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Fahasa</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="./images/3977825.png" type="image/x-icon">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="./css/bootstrap.css" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="https://cdn0.fahasa.com/media/favicon/default/favicon4.ico" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body id="main">
        <?php
        include('index/header.php');
        include('index/content.php');
        include('chatapp/index.php');
        ?>
        <?php
        if (isset($_GET['to'])) {
            if ($_GET['to'] == 'login') {
                include('customer/form.php');
            }
        }
        if (isset($_GET['detailID'])) {
            include('cart/detail.php');
        }
        if (isset($_GET['bookID'])) {
            include('book/book.php');
        }
        if ($_GET['to'] != 'login') {
            include('index/footer.php');
        }
        include('./modal.php');

        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script type="text/javascript">
            $('.carousel__banner').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                // arrows: false,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 4000,
                fade: true,
            });
            $('.flash__sale__content').slick({
                slidesToShow: 5,
                slidesToScroll: 5,
                arrows: false,
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
        <title>Trang chủ</title>
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
        <div class="text-center" style="margin-top:15%">
            <div>Không thể truy cập vào trang chủ nếu đang sử dụng tài khoản quản trị</div>
            <div><a href="#" style="color:blue" onclick="dangXuat()">Đăng xuất</a></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script>
            function dangXuat() {
                $.ajax({
                    url: "logout.php",
                    method: "POST",
                    data: {},
                    success: function(result) {
                        window.location.reload();
                    }
                })
            }
        </script>
    </body>

    </html>
<?php
}
?>
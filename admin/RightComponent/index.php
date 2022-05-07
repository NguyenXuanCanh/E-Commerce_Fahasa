<div class="content-page">
    <?php
    if (isset($_GET['to'])) {
        $permission = $_GET['to'];
        $function = new Permission();
        $functionName = $function->getFunctionName($permission);
        $functionName = $functionName->fetch_assoc();
        include('class/category.php');
        include('class/publisher.php');

    ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left"><?= $functionName['FunctionName'] ?></h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Trang chủ</li>
                                <li class="breadcrumb-item active"><?= $functionName['FunctionName'] ?></li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                switch ($_GET['to']) {
                    case 1: {
                            include('book.php');
                            break;
                        }
                    case 2: {
                            include('useraccount.php');
                            break;
                        }
                    case 3: {
                            include('datatable.php');
                            break;
                        }
                    case 4: {
                            include('decentralization.php');
                            break;
                        }
                    case 5: {
                            include('statistic.php');
                            break;
                        }
                    case 6: {
                            include('category.php');
                            break;
                        }
                    case 7: {
                            include('publisher.php');
                            break;
                        }
                    case 8: {
                            include('manageraccount.php');
                            break;
                        }
                    case 9: {
                        include('suport.php');
                        break;
                    }
                    default:
                        break;
                }
                ?>
            </div>
        </div>
        <?php
        ?>
    <?php
    } else {
    ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">Tình hình chung</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Trang chủ</li>
                                <li class="breadcrumb-item active">Tình hình chung</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                $sqlCountAcc = "SELECT * FROM customers";
                $resultCountAcc = $conn->query($sqlCountAcc);
                $counterAccount = 0;
                while ($row = $resultCountAcc->fetch_assoc()) {
                    $counterAccount++;
                }
                $sqlCountDH = "SELECT * FROM orders";
                $resultCountDH = $conn->query($sqlCountDH);
                $counterDH = 0;
                while ($row = $resultCountDH->fetch_assoc()) {
                    $counterDH++;
                }
                ?>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger pb-5">
                            <i class="far fa-user float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Tài khoản</h6>
                            <h1 class="m-b-20 text-white counter"><?= $counterAccount ?></h1>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning pb-5">
                            <i class="fas fa-shopping-cart float-right text-white"></i>
                            <h6 class="text-white text-uppercase m-b-20">Đơn hàng</h6>
                            <h1 class="m-b-20 text-white counter"><?= $counterDH ?></h1>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <a href="index.php?do=dhchuaxl">
                            <div class="card-box noradius noborder bg-danger pb-5">
                                <i class="fas fa-shopping-cart float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Đơn hàng chưa xử lý</h6>
                                <h1 class="m-b-20 text-white counter">...</h1>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <a href="index.php?do=dhdaxl">
                            <div class="card-box noradius noborder bg-success pb-5">
                                <i class="fas fa-shopping-cart float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Đơn hàng đã xử lý</h6>
                                <h1 class="m-b-20 text-white counter">...</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_GET['do'])) {
                    if ($_GET['do'] == 'dhchuaxl') {
                        include('RightComponent/dhchuaxl.php');
                    } else if ($_GET['do'] == 'dhdaxl') {
                        include('RightComponent/dhdaxl.php');
                    }
                }
                if (isset($_GET['orderdetail'])) {
                    include('RightComponent/orderdetail.php');
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
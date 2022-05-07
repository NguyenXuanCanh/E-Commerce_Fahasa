<?php
error_reporting(0);

$connect = new PDO("mysql:host=localhost; dbname=fahasa", "root", "");

$page = 1;

$filterData = $_POST['filterData'];
$sortByPrice = $filterData['sortByPrice'];
$minPrice = $filterData['minPrice'];
$maxPrice = $filterData['maxPrice'];
$checkedCateArray = $filterData['checkedArray'];
$limit = $filterData['numberProductPerPage'];

$search = $filterData['search'];

if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
} else {
    $start = 0;
}

// $limit = '12';

$minPrice *= 1000;
$maxPrice *= 1000;

$query = "SELECT * FROM Book ";

$query .= ' WHERE BookName LIKE "%' . $search . '%" ';

$query .= "AND Price>=$minPrice AND Price<=$maxPrice ";

$statement = $connect->prepare($query);
$statement->execute();
$data = $statement->rowCount();

if (!$data) {
    echo "<h3 class='text-center mt-3 w-100'>Không tìm thấy sản phẩm thỏa điều kiện</h3>";
    exit();
}

$isFill = false;
$count = 1;
foreach ($checkedCateArray as $row) {
    if ($row === 'true') {
        if ($isFill) {
            $query .= " OR CategoryID= $count ";
        } else {
            $isFill = true;
            $query .= "AND CategoryID= $count ";
        }
    }
    $count++;
}

if ($sortByPrice == 1) {
    $query .= 'ORDER BY Price DESC ';
} else {
    $query .= 'ORDER BY Price ASC ';
}

// var_dump($query);

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';
$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

if (!$total_data) {
    $output = "<h3 class='text-center mt-3 w-100'>Không tìm thấy sản phẩm thỏa điều kiện</h3>";
} else {
    $output = '';

    foreach ($result as $row) {
        if ($row['Discount']) {
            $priceSale =  (1 - $row['Discount']) * $row['Price'];
        } else $priceSale = $row['Price'];
        $output .= '
            <div class="col-3">
            <a href="index.php?bookID=' . $row['BookID'] . '">
                <div class="item flash__sale__item">
                    <img src="' . $row['Image'] . '" alt="" class="w-100">
                    <h6>' . $row['BookName'] . '</h6>
                    <div class="sale__price">' . number_format($priceSale, '0', ',', '.') . 'đ</div>
                    <div class="default__price">' . number_format($row['Price'], '0', ',', '.') . 'đ</div>
                </div>
            </a>
        </div>
        ';
    }

    $output .= '
    <br />
    <style>
    .pagination {
        margin-top: 4em;
        text-align: center;
        display: block;
    }

    .pagination ul li {
        display: inline-block;
    }

    .pagination a {
        display: inline-block;
        color: #000;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 20px;
        border-radius: 50% !important;
        font-weight: 600;
    }

    .pagination li.active a {
        background-color: #ffc945 !important;
        color: #fff;
    }

    .pagination a:hover {
        background-color: #ffc945;
        color: #fff;
    }

    </style>
    <div class="col-12" align="center" style="position: absolute; bottom: 10px; right: 10px;">
      <div class="pagination">
      <ul>
    ';

    $total_links = ceil($total_data / $limit);

    $previous_link = '';
    $next_link = '';
    $page_link = '';


    if ($total_links > 4) {
        if ($page < 5) {
            for ($count = 1; $count <= 5; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        } else {
            $end_limit = $total_links - 5;
            if ($page > $end_limit) {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $end_limit; $count <= $total_links; $count++) {
                    $page_array[] = $count;
                }
            } else {
                $page_array[] = 1;
                $page_array[] = '...';
                for ($count = $page - 1; $count <= $page + 1; $count++) {
                    $page_array[] = $count;
                }
                $page_array[] = '...';
                $page_array[] = $total_links;
            }
        }
    } else {
        for ($count = 0; $count <= $total_links; $count++) {
            $page_array[] = $count;
        }
    }

    for ($count = 1; $count < count($page_array); $count++) {
        if (!$total_data == 0) {
            if ($page == $page_array[$count]) {
                $page_link .= '
        <li class="page-item active ">
          <a class="page-link"  href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
        </li>
        ';

                $previous_id = $page_array[$count] - 1;
                if ($previous_id > 0) {
                    $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '"><</a></li>';
                } else {
                    $previous_link = '
          <li class="page-item disabled">
            <a class="page-link" href="#"><</a>
          </li>
          ';
                }
                $next_id = $page_array[$count] + 1;
                if ($next_id > $total_links) {
                    $next_link = '
          <li class="page-item disabled">
            <a class="page-link" href="#">></a>
          </li>
            ';
                } else {
                    $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">></a></li>';
                }
            } else {
                if ($page_array[$count] == '...') {
                    $page_link .= '
          <li class="page-item disabled">
              <a class="page-link" href="#">...</a>
          </li>
          ';
                } else {
                    $page_link .= '
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
          ';
                }
            }
        }
    }
    $output .= $previous_link . $page_link . $next_link;
    $output .= '
      </ul>
    </div>
    </div>
    ';
}


echo $output;

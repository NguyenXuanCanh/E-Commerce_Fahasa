<?php
include('class/category.php');
if (isset($_GET['key'])) {
    $key = $_GET['key'];
} else if (isset($_GET['cateID'])) {
    $cateID = $_GET['cateID'];
}
?>
<div class="product__wrapper pt-3">
    <div class="product__content product__list container pt-2" style="min-height:1011px">
        <div class="row ml-3 mt-2">
            <div class="col-4 form-group border-right">
                <h3>Xếp theo</h3>
                <select class="form-control ml-1" name="sortByPrice" id="sortByPrice">
                    <option value="1">Giá từ cao đến thấp</option>
                    <option value="0">Giá thừ thấp đến cao</option>
                </select>
                <select class="form-control mt-4" name="numberOfProductNeedRender" id="numberOfProductNeedRender">
                    <option value="12">12 sản phẩm</option>
                    <option value="20">20 sản phẩm</option>
                </select>
                <div id="rangeBox" class="mt-3">
                    <h3>Khoảng giá</h3>
                    <div id="sliderBox">
                        <div class="row ml-1">
                            <span class="col-5">
                                Thấp nhất:</span>
                            <span id="priceMin" class="col-1 mr-2">0</span>
                            <span style="margin-left:4px">.000vnd</span>
                            <input type="range" id="slider0to50" step="5" min="0" max="500">
                        </div>
                        <div class="row ml-1">
                            <span class="col-5">
                                Cao nhất:
                            </span>
                            <span id="priceMax" class="col-1 mr-2">500</span>
                            <span style="margin-left:4px">.000vnd</span>
                            <input type="range" id="slider51to100" step="5" min="0" max="500">
                        </div>
                    </div>
                </div>
                <h3 class="the__loai" style="margin-top: 40px;">Thể loại</h3>
                <?php
                $cate = new Category();
                $resultCate = $cate->getAll();
                $arrayCateCheck = [];
                foreach ($resultCate as $row) {
                    array_push($arrayCateCheck, false);
                ?>
                    <div class="form-check">
                        <input type="checkbox" id="<?= $row['CategoryID'] ?>" class="cateIDs" name="checkBox<?= $row['CategoryID'] ?>" value="<?= $row['Name'] ?>">
                        <label for="<?= $row['CategoryID'] ?>"><?= $row['Name'] ?></label>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-8" style="min-height:1011px">
                <div id="renderProductHere">
                    <div class="row" id="dynamic_content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    @media only screen and (max-width:1200px) {
        .the__loai {
            margin-top: 70px;
        }
    }
</style>
<script script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    function inputMinSliderLeft() { //slider update inputs
        document.getElementById("priceMin").innerHTML = sliderLeft.value;
    }

    function inputMaxSliderRight() { //slider update inputs
        document.getElementById("priceMax").innerHTML = sliderRight.value;
    }
    var sliderLeft = document.getElementById("slider0to50");
    var sliderRight = document.getElementById("slider51to100");
    var inputMin = document.getElementById("min");
    var inputMax = document.getElementById("max");
    sliderLeft.addEventListener("change", inputMinSliderLeft);
    sliderRight.addEventListener("change", inputMaxSliderRight);
</script>
<script>
    let checkedArray = <?php echo json_encode($arrayCateCheck); ?>;
    checkedArray[<?= $cateID ?> - 1] = 'true';
    $(document).ready(function() {
        sortByPrice = document.getElementById("sortByPrice").value;
        numberProductPerPage = document.getElementById("numberOfProductNeedRender").value;
        minPrice = document.getElementById("priceMin").innerHTML;
        maxPrice = document.getElementById("priceMax").innerHTML;
        search = "<?= $key ?>";
        let filterData = {
            sortByPrice,
            minPrice,
            maxPrice,
            checkedArray,
            numberProductPerPage,
            search,
        }
        load_data(1, filterData);
        for (let i in checkedArray) {
            checkedArray[i] = false;
            console.log(checkedArray[i]);
        }
        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            sortByPrice = document.getElementById("sortByPrice").value;
            numberProductPerPage = document.getElementById("numberOfProductNeedRender").value;
            minPrice = document.getElementById("priceMin").innerHTML;
            maxPrice = document.getElementById("priceMax").innerHTML;
            search = "<?= $key ?>";
            let filterData = {
                sortByPrice,
                minPrice,
                maxPrice,
                checkedArray,
                numberProductPerPage,
                search,
            }
            load_data(page, filterData);
        });

        $('#sortByPrice,#slider0to50,#slider51to100,#numberOfProductNeedRender,.cateIDs').change(function(event) {
            if (event.target) {
                let id = event.target.id;
                checkedArray[id - 1] = !checkedArray[id - 1];
                console.log(checkedArray)
            }
            sortByPrice = document.getElementById("sortByPrice").value;
            numberProductPerPage = document.getElementById("numberOfProductNeedRender").value;
            minPrice = document.getElementById("priceMin").innerHTML;
            maxPrice = document.getElementById("priceMax").innerHTML;
            search = "<?= $key ?>";
            let filterData = {
                sortByPrice,
                minPrice,
                maxPrice,
                checkedArray,
                numberProductPerPage,
                search,
            }
            load_data(1, filterData);
        });

        function load_data(page, filterData) {
            $.ajax({
                url: "filtersearch.php",
                method: "POST",
                data: {
                    page: page,
                    filterData: filterData,
                },
                success: function(data) {
                    console.log(data)
                    $('#dynamic_content').html(data);
                }
            });
        }
    });
</script>
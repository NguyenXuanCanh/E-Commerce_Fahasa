    <?php
    include('./class/category.php');
    $cateChecked = new Category();
    $resultCateChecked = $cateChecked->getAll();
    $counter = 0;
    $cateId = '';
    $cateIds = [];
    foreach ($resultCateChecked as $row) {
        if (isset($_POST['checkBox' . $row['CategoryID']])) {
            $cateId = $row['CategoryID'];
            array_push($cateIds, $row['CategoryID']);
            $counter++;
        }
    }
    ?>
    <div class="row pt-5" style="margin:auto;width:75%">
        <div class="col-4">
            <h1>Category</h1>
            <form action="index.php?to=book" method="post">
                <?php
                $cate = new Category();
                $resultCate = $cate->getAll();
                foreach ($resultCate as $row) {
                ?>
                    <div class="form-check">
                        <input type="checkbox" id="checkBox<?= $row['CategoryID'] ?>" name="checkBox<?= $row['CategoryID'] ?>" value="<?= $row['Name'] ?>">
                        <label for="checkBox<?= $row['CategoryID'] ?>"><?= $row['Name'] ?></label>
                    </div>
                <?php
                }
                ?>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <ul style="padding-left:0px" class="d-none">
                <li>
                    <button class="btn btn-primary mt-2">
                        <a class="text-white" href="index.php?to=newBook">New Book</a>
                    </button>
                </li>
                <li>
                    <button class="btn btn-primary mt-2">
                        <a class="text-white" href="index.php?to=newCategory">New Category</a>
                    </button>
                </li>
            </ul>
        </div>
        <div class="col-8">
            <h1>Book</h1>
            <div class="row">
                <?php
                include('./class/book.php');
                $veg = new Book();
                if ($counter == 0) {
                    $result = $veg->getAll();
                } else if ($counter == 1) {
                    $result = $veg->getListByCateID($cateId);
                } else {
                    $result = $veg->getListByCateIDs($cateIds);
                }
                foreach ($result as $row) {
                ?>
                    <div class="card col-4 p-1 text-center">
                        <img src="<?= $row['Image'] ?>" style="width:150px; height:130px ; margin:auto" alt="imgBook">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['BookName']; ?></h5>
                            <p class="card-text sale__price"><?php echo number_format($row['Price'], '0', ',', '.'); ?> vnd</p>
                            <button class="btn btn-danger" onclick="addToCart(<?= $row['BookID'] ?>)">Buy</button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        function addToCart(BookID) {
            $.ajax({
                type: "POST",
                url: "./addToCart.php",
                data: {
                    BookID,
                },
                success: function(response) {
                    document.getElementById("btnTriggerModal").click();
                    document.getElementById("modalContent").innerHTML = response;
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
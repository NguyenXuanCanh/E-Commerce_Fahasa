<?php
include('./class/category.php');
$cate = new Category();
$result = $cate->getAll();
?>
<div class="container">
    <h1>ADD Book</h1>
    <!-- <form class="row" method="post" enctype="multipart/form-data" action='./vegetable/add.php'> -->
    <form method="post" class="row" enctype="multipart/form-data" id="data">
        <div class="form-group col-8">
            <label for="exampleInputEmail1">Book Name</label>
            <input type="text" name="BookName" id="BookName" required class="form-control" placeholder="">
        </div>
        <div class="form-group col-4">
            <label>Category</label>
            <select required name="CategoryID" id="CategoryID" class="form-control">
                <option value="" selected disabled hidden> - select -</option>
                <?php foreach ($result as $row) { ?>
                    <option value=<?= $row['CategoryID'] ?>><?= $row["Name"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="exampleInputPassword1">Unit</label>
            <select name="Unit" id="Unit" class="form-control">
                <option value="Kg">Kg</option>
                <option value="lb">Pound</option>
            </select>
        </div>
        <div class="form-group col-4">
            <label for="exampleInputPassword1">Amount</label>
            <input type="number" name="Amount" id="Amount" min="0" class="form-control" required placeholder="">
        </div>
        <div class="form-group col-4">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="Price" id="Price" class="form-control" required placeholder="">
        </div>
        <div class="form-group col-4">
            <label for="file">Image</label>
            <input type="file" name="file" id="file" required>
        </div>
        <div class="form-group col-4">
        </div>
        <div class="form-group col-4">
            <input type="submit" class="btn btn-success" value="Upload" id="but_upload">
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("form#data").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './book/add.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                document.getElementById("btnTriggerModal").click();
                document.getElementById("modalContent").innerHTML = response;
                document.getElementById("BookName").value = "";
                document.getElementById("CategoryID").value = "";
                document.getElementById("Amount").value = "";
                document.getElementById("Price").value = "";
                document.getElementById("file").value = "";
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
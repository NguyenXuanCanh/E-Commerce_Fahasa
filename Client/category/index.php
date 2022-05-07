<?php
include('./class/category.php');
$cate = new Category();
$result = $cate->getAll();
?>
<div class="container">
    <h1>New Category</h1>
    <div class="row">
        <div class="col-4">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" id="cateName" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" id="cateDes" class="form-control" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary" onclick="addCategory(event)">Add</button>
            </form>
        </div>
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">CategoryID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $row) {
                    ?>
                        <tr>
                            <th scope="row"><?= $row['CategoryID'] ?></th>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Description'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function addCategory(event) {
        event.preventDefault();
        let categoryName = document.getElementById('cateName').value;
        let categoryDes = document.getElementById('cateDes').value;
        $.ajax({
            url: './category/add.php',
            method: 'POST',
            data: {
                categoryData: {
                    categoryName,
                    categoryDes,
                }
            },
            success: function(result) {
                if (result == '') {
                    document.getElementById("btnTriggerModal").click();
                    document.getElementById("modalContent").innerHTML = `
                    <div>Add success</div>
                    `;
                    document.getElementById('cateName').value = '';
                    document.getElementById('cateDes').value = '';
                } else {
                    document.getElementById("btnTriggerModal").click();
                    document.getElementById("modalContent").innerHTML = result;
                }
            }

        });
    }
</script>
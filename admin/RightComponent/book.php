<!-- changeInfomation -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="top:30%" role="document">
        <div class="modal-content">
            <form id="editForm" method="post" class="form-group" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label>Tên sách</label>
                        <input class="form-control" name="bookName" id="bookName" type="text" value="">
                    </div>
                    <div class="d-none">
                        <label>ID sách</label>
                        <input class="form-control" name="BookID" id="BookID" type="text" value="">
                    </div>
                    <div>
                        <label>Giá sách</label>
                        <input class="form-control" name="bookPrice" id="bookPrice" type="text" value="">
                    </div>
                    <div>
                        <label>Giảm giá</label>
                        <input class="form-control" name="bookDiscount" id="bookDiscount" type="text" value="">
                    </div>
                    <div>
                        <label>Tình trạng sách</label>
                        <select class="form-control" name="bookStatus" id="bookStatus" class="form-control" style="height:34px">
                            <option value="" selected disabled hidden> --</option>
                            <option value="0">Mới</option>
                            <option value="1">Cũ</option>
                        </select>
                    </div>
                    <div>
                        <label>Nhà xuất bản</label>
                        <?php
                        $publisher = $conn->query("SELECT * FROM publisher");
                        ?>
                        <select class="form-control" name="publisher" id="publisher" class="form-control" style="height:34px">
                            <option value="" selected disabled hidden> --</option>
                            <?php foreach ($publisher as $row) { ?>
                                <option value=<?= $row['PublisherID'] ?>><?= $row["PublisherName"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4 p-0">
                            <style>
                                .select2-search--dropdown {
                                    display: none;
                                }
                            </style>
                            <label>Thể loại</label>
                            <?php
                            $cate = new Category();
                            $cate = $cate->getAll();
                            ?>
                            <select class="form-control" name="bookCate" id="bookCate" class="form-control" style="height:34px">
                                <option value="" selected disabled hidden> --</option>
                                <?php foreach ($cate as $row) { ?>
                                    <option value=<?= $row['CategoryID'] ?>><?= $row["Name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="fileToUpload">Hình ảnh</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete -->
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_delete_book" aria-hidden="true" id="modal_delete_book">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="deleteForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa sách</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tên sách</label>
                                <input class="form-control modalInput" name="deleteName" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ID Sách</label>
                                <input class="form-control modalInput" name="BookID" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Bạn có chắc muốn xóa sách này</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- import -->
<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_import_book" aria-hidden="true" id="modal_import_book">
    <div class="modal-dialog" style="top:30%">
        <div class="modal-content">
            <form id="importForm" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Nhập thêm sách</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="row d-none">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>ID Sách</label>
                            <input class="form-control modalInput" name="BookID" id="BookIDImport" type="text" required readonly="readonly" />
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tên sách</label>
                                <input class="form-control modalInputImport" id="BookNameImport" name="BookNameImport" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nhập thêm</label>
                                <input class="form-control" type="number" id="BookAmountImport" name="BookAmountImport" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" type="text" id="BookDesImport" name="BookDesImport" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- render -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-alt"></i> Danh sách sách</h3>
                <span><a href="bookaddpage.php" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i> Thêm sách</a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="min-width: 300px">Thông tin cơ bản</th>
                                <th style="width:110px">Số lượng</th>
                                <th style="min-width:110px">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM book";
                            $result = $conn->query($sql);
                            ?>
                            <?php
                            $count = 0;
                            foreach ($result as $row) {
                                $cate = new Category();
                                $cate = $cate->getCateByID($row['CategoryID']);
                                $cate = $cate->fetch_assoc();
                                $publisher = new Publisher();
                                $publisher = $publisher->getPublisherByID($row['PublisherID']);
                                $publisher = $publisher->fetch_assoc();
                            ?>
                                <tr>
                                    <td class="row">
                                        <div class="col-2">
                                            <img class="img-fluid d-none d-lg-block" style="cursor:pointer" alt="image" src="../Client/<?= $row['Image'] ?>" />
                                        </div>
                                        <div class="col-10">
                                            <h4 class="bookName"><?= $row['BookName'] ?></h4>
                                            <div class="mt-1">
                                                Giá gốc: <span class="bookPrice"><?= $row['Price'] ?></span>
                                            </div>
                                            <div class="mt-1">
                                                Giảm giá: <span class="bookDiscount"><?= $row['Discount'] ?></span>
                                            </div>
                                            <div class="mt-1">
                                                Thể loại: <span class="bookCate"><?= $cate['Name'] ?></span>
                                            </div>
                                            <div class="mt-1">
                                                Nhà xuất bản: <span class="bookCate"><?= $publisher['PublisherName'] ?></span>
                                            </div>
                                            <div class="mt-1">
                                                Cũ: <span class="bookStatus"><?= $row['Old'] ?></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>Đã bán: <?= $row['Sold'] ?></div>
                                        <div class="border-top mt-5 pt-1">Còn lại: <?= $row['Amount'] ?></div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" onclick="editBook('<?= $count ?>', '<?= $row['BookID'] ?>','<?= $row['CategoryID'] ?>','<?= $row['PublisherID'] ?>')"><i class="far fa-edit"></i> Chỉnh sửa</button>
                                        <button type="button" class="btn btn-danger btn-sm  btn-block" data-toggle="modal" data-target="#modal_delete_book" onclick="deleteBook('<?= $row['BookID'] ?>', '<?= $row['BookName'] ?>')">
                                            <i class="fas fa-trash"></i> Xóa</button>
                                        <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#modal_import_book" onclick="importBook('<?= $row['BookID'] ?>', '<?= $row['BookName'] ?>')"> <i class="fas fa-trash"></i>Nhập hàng</button>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
    function editBook(index, BookID, CategoryID, publisherID) {
        let bookName = document.getElementsByClassName("bookName");
        let bookPrice = document.getElementsByClassName("bookPrice");
        let bookDiscount = document.getElementsByClassName("bookDiscount");
        let bookStatus = document.getElementsByClassName("bookStatus");
        document.getElementById("bookName").value = bookName[index].innerText;
        document.getElementById("bookPrice").value = bookPrice[index].innerText;
        document.getElementById("bookDiscount").value = bookDiscount[index].innerText;
        document.getElementById("bookStatus").value = bookStatus[index].innerText;
        document.getElementById("bookCate").value = CategoryID;
        document.getElementById("publisher").value = publisherID;
        document.getElementById("BookID").value = BookID;
    }
    $("#editForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './book/changeInfo.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    function importBook(BookID, BookName) {
        document.getElementById("BookIDImport").value = BookID;
        document.getElementById("BookNameImport").value = BookName;

    }
    $("#importForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './book/import.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    function deleteBook(BookID, BookName) {
        let modalInput = document.getElementsByClassName("modalInput");
        modalInput[0].value = BookName;
        modalInput[1].value = BookID;
    }
    $("#deleteForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './book/delete.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                alert(response);
                window.location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<script>

</script>
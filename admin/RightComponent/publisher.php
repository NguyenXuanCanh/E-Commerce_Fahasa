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
                        <label>Tên nhà xuất bản</label>
                        <input class="form-control" name="PublisherName" id="PublisherName" type="text" value="">
                    </div>
                    <div class="d-none">
                        <label>ID nhà xuất bản</label>
                        <input class="form-control" name="PublisherID" id="PublisherID" type="text" value="">
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
                    <h5 class="modal-title">Xóa nhà xuất bản</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tên nhà xuất bản</label>
                                <input class="form-control modalInput" name="PublisherName" id="delPublisherName" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row d-none">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ID nhà xuất bản</label>
                                <input class="form-control modalInput" name="PublisherID" id="delPublisherID" type="text" required readonly="readonly" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Bạn có chắc muốn xóa nhà xuất bản này</label>
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
                    <h5 class="modal-title">Thêm nhà xuất bản</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tên nhà xuất bản</label>
                                <input class="form-control modalInputImport" id="PublisherName" name="PublisherName" type="text" required />
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
                <h3><i class="far fa-file-alt"></i> Danh sách nhà xuất bản</h3>
                <span><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_import_book"><i class="fas fa-plus" aria-hidden="true"></i> Thêm nhà xuất bản</a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:110px">Mã nhà xuất bản</th>
                                <th style="min-width: 300px">Tên nhà xuất bản</th>
                                <th style="min-width:110px">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $publisher = new Publisher();
                            $publisher = $publisher->getAll();
                            foreach ($publisher as $row) {
                            ?>
                                <tr>
                                    <td class="row">
                                        <div class="mt-1">
                                            <span class="bookCate"><?= $row['PublisherID'] ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pt-1"><?= $row['PublisherName'] ?></div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" onclick="editPublisher('<?= $row['PublisherID'] ?>', '<?= $row['PublisherName'] ?>')"><i class="far fa-edit"></i> Chỉnh sửa</button>
                                        <button type="button" class="btn btn-danger btn-sm  btn-block" data-toggle="modal" data-target="#modal_delete_book" onclick="deletePublisher('<?= $row['PublisherID'] ?>', '<?= $row['PublisherName'] ?>')">
                                            <i class="fas fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                            <?php
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
    function editPublisher(PublisherID, PublisherName) {
        document.getElementById("PublisherName").value = PublisherName;
        document.getElementById("PublisherID").value = PublisherID;
    }
    $("#editForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './publisher/update.php',
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

    $("#importForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './publisher/import.php',
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

    function deletePublisher(PublisherID, PublisherName) {
        document.getElementById("delPublisherName").value = PublisherName;
        document.getElementById("delPublisherID").value = PublisherID;
    }
    $("#deleteForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: './publisher/delete.php',
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
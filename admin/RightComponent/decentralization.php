<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <span class="pull-right">
                </span>
                <h3>
                    <i class="far fa-user"></i> Phân quyền theo chức năng
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="min-width:300px">Tên quyền</th>
                                <th style="width:1200px">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $function = new Permission();
                            $function = $function->getAllFunction();
                            $count = 0;
                            $permission = new Permission();
                            $permission = $permission->getAllPermission();
                            foreach ($permission as $row) {
                                if ($row['PermissionID'] == 2) continue;
                            ?>
                                <tr>
                                    <td>
                                        <h3 class="m-0"><span class=""><?= $row['PermissionName'] ?></span></h3>
                                    </td>
                                    <td class="empower">
                                        <?php
                                        echo '<ul>';
                                        foreach ($function as $chucNang) {
                                            $maQuyen = $row['PermissionID'];
                                            $maChucNang = $chucNang['FunctionID'];
                                            $sqlCheckFill = "SELECT * FROM permissiondetail WHERE PermissionID=$maQuyen AND FunctionID=$maChucNang";
                                            if ($conn->query($sqlCheckFill)->num_rows) {
                                                echo '
                                                        <li>
                                                        <input type="checkbox" value="" checked onchange="reloadResult(' . $row['PermissionID'] . ',' . $chucNang['FunctionID'] . ')">
                                                        <label  class="mr-5">' . $chucNang['FunctionName'] . '</label>
                                                        </li>
                                                    ';
                                            } else {
                                                echo '
                                                        <li>
                                                        <input type="checkbox" value=""  onchange="reloadResult(' . $row['PermissionID'] . ',' . $chucNang['FunctionID'] . ')">
                                                        <label  class="mr-5">' . $chucNang['FunctionName'] . '</label>
                                                        </li>
                                                    ';
                                            }
                                        }
                                        echo '</ul>';
                                        ?>
                                    </td>
                                </tr>
                            <?php
                                $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function reloadResult(PermissionID, FunctionID) {
        $.ajax({
            url: 'xulyphanquyen.php',
            type: 'post',
            data: {
                PermissionID,
                FunctionID
            },
            success: function(result) {
                // console.log(result);
            }
        })
    }
</script>
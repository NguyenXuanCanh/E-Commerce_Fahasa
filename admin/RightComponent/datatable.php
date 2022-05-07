<div class="container">
    <h3 align="center">Bảng dữ liệu</h3>
    <br />
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td class="text-center">ID</td>
                    <td class="text-center">Hình ảnh</td>
                    <td class="text-center">Tên</td>
                    <td class="text-center">Giá</td>
                    <td class="text-center">Giảm giá</td>
                    <td class="text-center">Còn lại</td>
                    <td class="text-center">Đã bán</td>
                </tr>
            </thead>
            <?php
            $query = "SELECT * FROM book ORDER BY BookID ASC";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                echo '  
                                            <tr>  
                                            <td class="text-center" style="min-width:100px">' . $row["BookID"] . '</td>  
                                                <td class="text-center">
                                                <img src= ../Client/' . $row["Image"] . ' style="width:100px" />
                                                </td>  
                                                <td class="text-center" style="min-width:200px">' . $row["BookName"] . '</td>  
                                                <td class="text-center" style="min-width:100px">' . $row["Price"] . '</td>  
                                                <td class="text-center" style="min-width:100px">' . $row["Discount"] . '</td>  
                                                <td class="text-center" style="min-width:300px">' . $row["Amount"] . '</td>  
                                                <td class="text-center" style="min-width:300px">' . $row["Sold"] . '</td>  
                                            </tr>  
                                        ';
            }
            ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="row formtitle">
        <h2>DANH SÁCH TÀI KHOẢN</h2>
    </div>
    <div class="row formcontent">
        <div class="row mb10 formdslh">
            <table>
                <tr>
                    <th></th>
                    <th>Mã Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listtaikhoan as $taikhoan) {
                    extract($taikhoan);
                    $suatk = "index.php?act=suatk&id=" .$id;
                    $xoatk = "index.php?act=xoatk&id=" .$id;
                    echo ' <tr>
                    <td><input type="checkbox" name="check" id=""/><td>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$role.'</td>
                    <td>
                        <a href="' . $suatk . '"><input type="button" value"Sửa" /></a>
                        <a href="' . $xoatk . '"><input type="button" value"Xóa" /></a>
                    </td>
                    </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
        </div>
    </div>
</div>
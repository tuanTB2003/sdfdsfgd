<div class='bg-white rounded p-4 shadow-sm m_top content'>
    <form action='index.php?c=changePass' method='post'>
        <?php echo $err != "" ?  "
                <div class='alert alert-danger' role='alert'>
                    Lỗi: $err
                </div>
            "
            :
            
            ''
        ?>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ</label>
                <input type="text" name='oldPass' value='' class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
                <input type="text" name ='newPass' value='' class="form-control">
            </div>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Xác nhận mật khẩu</label>
            <input type="text" name ='comfirm' value='' class="form-control">
        </div>
        <button type="submit" name='btn_submit' class="btn btn-primary">Lưu</button>
    </form>
    <?php
            if(isset($success) && ($success != "")){
                echo"
                    <div class='alert alert-success mt-3' role='alert'>
                        Cập nhập thành công
                    </div>
                ";
            }
        ?>
</div>

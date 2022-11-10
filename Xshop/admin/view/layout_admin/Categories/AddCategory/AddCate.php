<div class="navbar navbar-expand-lg bg-white rounded px-3 mb-4 shadow-sm caption-ifor">
    <h1 class='fs-4 rounded navbar-brand'>Danh sách loại mặt hàng</h1>
    <div class="input-group">
        <form class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<div class='bg-white rounded p-3  shadow-sm'>
    <?php echo $err != "" ?  "
                <div class='alert alert-danger' role='alert'>
                    Lỗi: $err
                </div>
            "
            :
            
            ''
        ?>
    <form action='admin.php?c=addCate' method='post'>
        <div class=''>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Tên loại hàng</label>
                <input type="text" name='category' class="form-control">
            </div>
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Tạo mới</button>
    </form>
        <?php
            if(isset($success) && ($success != "")){
                echo"
                    <div class='alert alert-success mt-3' role='alert'>
                        Thêm thành công
                    </div>
                ";
            }
        ?>
</div>

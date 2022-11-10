<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm mb-4">
    <h1 class='fs-4 rounded navbar-brand'>Sửa thông tin loại hàng</h1>
    <div class="input-group gap-2">
        <form class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <div class='my-auto'>
            <button class="btn btn-outline-secondary">Thêm mới</button>
        </div>
    </div>
</div>
<?php 
?>
<div class='bg-white rounded p-3  shadow-sm'>
        <?php echo $err != "" ?  "
                        <div class='alert alert-danger' role='alert'>
                            Lỗi: $err
                        </div>
                    "
                    :
                    
                    ''
        ?>
    <form action ='admin.php?c=updateCate' method='post'>
        
        <div class="row">
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Mã loại</label>
                <input type="text" class="form-control" disabled value = <?php echo $currenCategory['id'] ?>>
            </div>
            <div class="mb-3 col">
                <input type="text" hidden name = 'id' value = <?php echo $currenCategory['id'] ?>>
                <label for="exampleInputEmail1" class="form-label">Tên loại hàng</label>
                <input type="text" class="form-control" name='category' value =<?php echo $currenCategory["ten_loai"]?>>
            </div>
        </div>
        <button type="submit" name="updateCate" class="btn btn-primary">Cập nhật</button>
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

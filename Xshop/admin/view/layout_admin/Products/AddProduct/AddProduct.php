<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm mb-4">
    <h1 class='fs-4 rounded navbar-brand'>Thêm sản phẩm</h1>
    <div class="input-group gap-2">
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
    <form action ='admin.php?c=addProduct' method ='post' enctype='multipart/form-data'>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" name ='nameProduct' class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Giá </label>
                <input type="number" name ='priceProduct' class="form-control">
            </div>
        </div>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                <input type="number" name='quantityProduct' class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Ngày nhập</label>
                <input type="date" class="form-control" name='date' value='<?php echo date('Y-m-d'); ?>'>
            </div>
        </div>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Loại</label>
                <select class="form-select" name='categoryProduct' aria-label="Default select example">
                    <option selected value=''>Loại</option>
                    <?php forEach($allCategories as $value):?>
                    <option value="<?php echo $value["id"]?>"><?php echo $value["ten_loai"]?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
                <select class="form-select" name='condition' aria-label="Default select example">
                    <?php forEach($status as $value):?>
                        <option value ='<?php echo $value?>'><?php echo $value?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
           
        <div class="mb-3 ">
            <label for="formFile" class="form-label">Ảnh</label>
            <input class="form-control" type="file" name='imgProduct' id="formFile">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name='descProduct' placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Mô tả</label>
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Lưu</button>
    </form>
    <?php
            if(isset($success) && ($success != "")){
                echo"
                    <div class='alert alert-success mt-3' role='alert'>
                        Thêm thành công
                    </div>
                ";

            };
            
            
        ?>
</div>

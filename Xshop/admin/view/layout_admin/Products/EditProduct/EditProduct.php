<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm mb-4">
    <h1 class='fs-4 rounded navbar-brand'>Sửa thông tin sản phẩm</h1>
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

<div class='bg-white rounded p-3  shadow-sm'>
    <?php echo $err != "" ?  "
            <div class='alert alert-danger' role='alert'>
                Lỗi: $err
            </div>
        "
        :
        
        ''
    ?>
    <form action='admin.php?c=updateProduct' method='post' enctype='multipart/form-data'>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1"  class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name='name' value = '<?php echo $currenProduct['ten_hh']?>'>
                <input type="text" hidden name='id' value = '<?php echo $currenProduct["id"]?>'>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Giá </label>
                <input type="number" class="form-control"  name='price' value='<?php echo $currenProduct["gia"]?>'>
            </div>
        </div>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1"  class="form-label">Số lượng</label>
                <input type="number" class="form-control" name ='quantity' value='<?php echo $currenProduct["so_luong"]?>'>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1"  class="form-label">Ngày nhập</label>
                <input type="date" class="form-control" name='date' value='<?php echo $currenProduct["ngay_nhap"]; ?>'>
            </div>
        </div>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Số lượt xem</label>
                <input type="number" name='check' class="form-control" value = '<?php echo $currenProduct["so_luot_xem"]; ?>'>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1"  class="form-label">Trạng thái</label>
                <select class="form-select" name='condition' aria-label="Default select example">
                    <option hidden><?php echo $currenProduct["dac_biet"]?></option>
                    <?php forEach($status as $value):?>
                        <option value ='<?php echo $value?>'><?php echo $value?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="exampleInputEmail1"  class="form-label">Giảm giá</label>
                <input type="number" class="form-control" name ='discount' value = '<?php echo $currenProduct["giam_gia"]; ?>'>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Loại</label>
                <select class="form-select" name='category' aria-label="Default select example">
                    <option hidden value = '<?php echo $categoryProduct["id"]?>'><?php echo $categoryProduct["ten_loai"]?></option>
                    <?php forEach($allCategories as $value):?>
                        <option value="<?php echo $value["id"]?>"><?php echo $value["ten_loai"]?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Ảnh</label>
            <input class="form-control" name='img' type="file">
            <img class='img_show' src="./access/img/products/<?php echo $currenProduct["hinh"]?>" alt="">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name='desc' id="floatingTextarea"><?php echo $currenProduct["mo_ta"]?></textarea>
            <label for="floatingTextarea">Mô tả</label>
        </div>

        <button type="submit" name='btn_update' class="btn btn-primary">Lưu</button>
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

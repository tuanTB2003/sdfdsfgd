<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm mb-4">
    <h1 class='fs-4 rounded navbar-brand'>Sửa thông tin khách hàng</h1>
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
<div class='bg-white rounded p-3 shadow-sm'>
    <div class='d-flex gap-2 mb-4'>
        <img class='avatar-img' src="./access/img/avatar/<?php echo $currentUser['hinh']?>" alt="">
        <div class="name-user">
            <p class='fw-bold fs-4 mt-2'><?php echo $currentUser['ho_ten']?></p>
            <p class='fst-italic'>Code ko bug xoa group</p>
        </div>
    </div>
    
    <form action='admin.php?c=updateUser' method='post' enctype='multipart/form-data'>
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
                <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                <input type="text" name ='name' class="form-control" value ='<?php echo $currentUser['ho_ten']?>' id="exampleInputEmail1">
                <input type="text" name='id' hidden value="<?php echo $currentUser['id']?>">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" value='<?php echo $currentUser['email']?>' readonly value="ddddddd">
            </div>
        </div>
        <div class='row'>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Avatar</label>
                <input type="file" name='img' class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label" >Mật khẩu</label>
                <input type="text" class="form-control" readonly value = '<?php echo $currentUser['mat_khau']?>'>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Vai trò</label>
            <select class="form-select" name='role' aria-label="Default select example">
                <option hidden><?php echo $currentUser["vai_tro"]?></option>
                <?php foreach ($role as $value):?>
                    <option value="<?php echo $value?>"><?php echo $value?></option>
                <?php endforeach; ?>
            </select>
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

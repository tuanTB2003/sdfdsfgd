<div class='bg-white rounded p-4 shadow-sm m_top content'>
    <div class='d-flex gap-2 mb-4'>
        <img class='avatar-img' src="./access/img/avatar/<?php echo $currentAcc['hinh']?>" alt="">
        <div class="name-user">
            <p class='fw-bold fs-4 mt-2'><?php echo $currentAcc['ho_ten']?></p>
            <p class='fst-italic'>Code ko bug xoa group</p>
        </div>
    </div>
    <form action='index.php?c=updateAccount' method='post' enctype='multipart/form-data'>
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
                <input type="text" name='name' value='<?php echo $currentAcc['ho_ten']?>' class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name ='email' value='<?php echo $currentAcc['email']?>' class="form-control" disabled placeholder="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Avatar</label>
            <input type="file" name ='avatar'  class="form-control" id="exampleInputEmail1">
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

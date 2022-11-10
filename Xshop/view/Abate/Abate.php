<?php $tongtien = 0;
            $thanhtien = 0;?>
        <?php foreach($_SESSION['mycart'] as $value):?>
            <?php $thanhtien = $value['gia'] * $value['so_luong'];
                $discount = $value['giam_gia'];
                $discountMoney  = $thanhtien * ($discount / 100);
                if($discount != 0){
                    $tongtien += $thanhtien -  $discountMoney;

                }else{
                    $tongtien += $thanhtien;
                }
            ?>
            
        <?php endforeach?>
<div class="m_top content ">
    <h3 class='mb-4'>Thanh Toán</h3>
    <div  class="row gap-4">
        <form class="col-md-6" action ='index.php?c=acceptPayment' method='post'>
            <?php echo $err != "" ?  "
                <div class='alert alert-danger' role='alert'>
                    Lỗi: $err
                </div>
            "
            :
            
            ''
            ?>
            <div class="row">
                <div class="mb-3 col">
                    <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                    <input type="text" name='name' class="form-control">
                </div>
                <div class="mb-3 col">
                    <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                    <input type="number" class="form-control" name='number'>
                </div>
            </div>
            <div class="mb-3 col">
                <label for="exampleInputPassword1" class="form-label">Địa chỉ cụ thể</label>
                <input type="text" class="form-control" name='address'>
            </div>
            <div class ='d-flex flex-column '>
                <div>
                    <input type="radio" name="payment" id="" value='Tiền mặt' checked> Tiền mặt
                </div>
                <div>
                    <input type="radio" name="payment" value='Trực tiếp' id=""> Trực tiếp
                </div>
                <div>
                    <input type="radio" name="payment" value='Thẻ tín dụng' id=""> Thẻ tín dụng
                </div>
            </div>
            <div class="row">
                
            </div>
            <button  type="submit" name ='submit'class="btn btn-primary mt-4">Xác nhận thanh toán</button>
        </form>
        <div class='col-md-5 border p-3'>
            <?php foreach($_SESSION['mycart'] as $value):?>
                <div class='d-flex align-items-center mb-3 gap-3'>
                    <img src="./access/img/products/<?php echo $value['hinh']?>" class='img_cart' alt="">
                    
                    <div>
                        <p><?php echo $value['ten_san_pham']?></p>
                        <p class='desc'>số lượng : <?php echo $value['so_luong']?></p>
                        <p class='desc'>Giá : <?php echo number_format($value['gia'], 0, '',',') ?> vnđ</p>
                    </div>
                </div>
                <div class='my-4'>
                    <hr class='dropdown-divider'/>
                </div>
            <?php endforeach;?>
            <h4>Tổng tiền: <?php echo number_format($tongtien, 0, '',',') ?> vnđ</h4>
        </div>
    </div>
</div>
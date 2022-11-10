<?php 
    if(!empty($_SESSION)){
       
    }else{
        header("Location: login.php");
    }

?>

<div class= 'm_top content'>
    <table class="table table-hover">
    <thead>
        <tr class='text-center'>
        <th scope="col">Xóa</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Giảm giá</th>
        <th scope="col">Cập nhật</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['mycart'] as $value):?>
            <tr class='text-center'>
        <form action="index.php?c=updateCart" method="post">
                <th scope="row">
                    <a href="index.php?c=deleteCart&id=<?php echo $value['id']?>">
                        <i class="bi bi-x-octagon"></i>
    
                    </a>
                </th>
                <td >
                    <img class='img_cart' src="access/img/products/<?php echo $value['hinh']?>" alt="">
                </td>
                <td><?php echo $value['ten_san_pham']?></td>
                <td><?php echo number_format($value['gia'], 0, '',',') ?> vnđ</td>
                <td class=''>
                    <input type="text" hidden name='idProduct' value='<?php echo $value['id']?>'>
                    <input type="number" name='quantity' min='1' name="" value='<?php echo $value['so_luong']?>' id="">
                </td>
                <td><?php echo  $value['giam_gia']?>%</td>
                <td>
                    <a href="">
                        <button type='submit' name='submit' class="btn btn-primary">Cập nhật</button>
                    </a>
                </td>
                
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php if(COUNT($_SESSION['mycart']) < 1 ){echo ''; }else{?>

    <div class="m_top content border p-5 payment">
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
        <form action = 'index.php?c=abate' method = 'post'>
            <h3 class='mb-5'>Tổng Tiền</h3>
            <div class='d-flex flex-column gap-2'>
                <div class='d-flex gap-2'>
                    <p>Ship: </p>
                    <p>FREE</p>
                </div>
                <div class='d-flex gap-2'>
                    <p>Tổng tiền: </p>
                    <p> <?php echo number_format($tongtien, 0, '',',') ?> vnđ</p>
                    <input type="text" name='tong_tien' hidden value='<?php  echo $tong_tien ; ?>'>
                    
                </div>  
    
            </div>
            <button type="submit" name ='submit' class="btn btn-primary">Thanh Toán</button>
        </form>
       
    </div>
<?php }?>
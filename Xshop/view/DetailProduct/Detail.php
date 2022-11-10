<div class='content  m_top row row-cols-md-2'>
    <?php foreach($productDetail as $value):?>
        <img src="./access/img/products/<?php echo $value['hinh']?>" class='col shadow' alt="">
        <div class='col ps-5'>
            <h3 class="fs-1  col pt-5"><?php echo $value['ten_hh']?></h3>
            <p class="desc">Áo rẻ-đẹp-chất lượng</p>
            <form action ='index.php?c=cart' method="post" >
                <h2 class="text-dark fw-bold mb-4"><?php echo number_format($value['gia'], 0, '',',') ?> vnđ</h2>
                <input type="text" name='img' hidden value = '<?php echo $value['hinh']?>'>
                <input type="text" name='name' hidden value = '<?php echo $value['ten_hh']?>'>
                <input type="text" hidden name ='price' value ='<?php echo $value['gia']?>' />
                <input type="number" value='1' min="1" name ='quantity' class='input_quantity me-2'>
                <input type="text" name ='idProduct' hidden value='<?php echo $value['id']?>'>
                <a href="">
                    <button type ='submit' name='addCart' class="btn bg-success text-white fw-bold">Thêm vào giỏ hàng</button>
                </a>
            </form>
            <div class='mt-3'>
                <h3>Description: </h3>
                <p><?php echo $value['mo_ta']?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="m_top content">
    <div class="text-center mb-5">
        <h1 class="caption">Sản phẩm liên quan</h1>
        <p class="desc gray">Quần áo rẻ-đẹp-chất lượng</p>

    </div>
    <div class="row gap-4 ">
        <?php foreach($relatedItem as $value):?>
        <div class="card cart mb-5 col-xl mx-auto hidden fromBottom radius overflow-hidden" style="width: 18rem;">
            <a href="index.php?c=detail&id=<?php echo $value["id"]?>">
                <img src="./access/img/products/<?php echo $value['hinh']?>" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
                <a href="index.php?c=detail&id=<?php echo $value["id"]?>" class="text-decoration-none text-dark">
                    <h3 class="nameProduct"><?php echo $value['ten_hh']?></h3>
                </a>
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h5 class='text_success'><?php echo number_format($value['gia'], 0, '',',') ?> vnđ</h5>
                    <a href="index.php?c=detail&id=<?php echo $value["id"]?>" class="btn background_success text_success rounded-circle">
                        <i class="bi bi-cart-fill"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="content m_top">
    <h5 class="caption mb-5">Đánh giá sản phẩm</h5>
    <?php include './view/Comment/ViewComment.php'?>
    <?php     
        if(empty($_SESSION)){
    ?>
        <p><a href="login.php">Đăng nhập</a> để bình luận</p>
    <?php }else{?>    
        <form action='index.php?c=detail&id=<?php foreach($productDetail as $value){echo $value["id"];}?>' method='post' >
            <div class="form-floating">
                <textarea class="form-control" name='comment' placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <?php echo isset($errCmt) ? "<p class='err' for=''>$errCmt</p class='err'>" : "" ?>
            <input type="date" name='date' hidden value='<?php echo date('Y-m-d'); ?>'>
            <button type='submit' name='submit_cmt' class="btn bg-success text-white fw-bold mt-4 text-right">Gửi</button>
        </form>
    <?php }?>   
    

</div>
<div class="banner position-relative m_banner ">
    <div class="position-absolute top-50 start-40 group ">
        <h4 class='mb-4'>Trade-in-offer</h4>
        <h2 class='small-title'>Super value deals <h1 class='title'>On all products</h1></h2>
        <p class='desc mt-4 gray'>Save more-with coupons & up to 70% off</p>
        <a href="">
            <button type="button" class="btn btn-info fw-bold px-4 gray">Shop now</button>
        </a>
    </div>
</div>
<!-- feature -->
<div class='mt-5 hidden '>
    <div class='d-flex justify-content-between flex-wrap gap-4  content'>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromLeft'>
            <img src="./access/img/features/f1.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 text_infor background_infor'>Free Ship</p>

        </div>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromLeft'>
            <img src="./access/img/features/f2.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 background_success text_success'>Online Order</p>

        </div>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromLeft'>
            <img src="./access/img/features/f3.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 text_infor background_infor'>Save Money</p>

        </div>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromRight '>
            <img src="./access/img/features/f4.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 background_success text_success'>Promotions</p>

        </div>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromRight '>
            <img src="./access/img/features/f5.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 text_infor background_infor'>Happy Sell</p>

        </div>
        <div class='box_suppose d-flex flex-column p-2 justify-content-center shadow hidden fromRight '>
            <img src="./access/img/features/f6.png" alt="">
            <!-- <a href="">
                
            </a> -->
            <p class='text-center mx-3 rounded gray fw-bold py-1 mt-2 background_success text_success'>24/5 support</p>

        </div>
    </div>
</div>
<!-- product top 7 -->
<div class="m_top content hidden">
    <div class="text-center mb-5">
        <h1 class="caption">Sản phẩm mới ra mắt</h1>
        <p class="desc gray">Quần áo rẻ-đẹp-chất lượng</p>

    </div>
    <div class="row gap-4">
        <?php foreach($topNew as $value):?>
        <div class="card mb-5 col-xl mx-auto radius cart overflow-hidden hidden fromBottom" style="width: 18rem;">
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

<div class="advertise position-relative m_top hidden ">
    <div class="service position-absolute text-white top-50 start-50 translate-middle">
        <h4 class="text-center">Giảm giá</h4>
        <h2 class='mt-4'>Giảm giá đến 70% - Tất cả áo phông và quần đùi</h2>
        <a href="" class="d-flex justify-content-center text-decoration-none mt-4">
            <button type="button" class="btn btn-info fw-bold px-4 gray">Shop now</button>
        </a>
    </div>
</div>

<div class='m_top content hidden '>
    <div class="text-center mb-5">
        <h1 class="caption">Sản phẩm ra mắt lâu</h1>
        <p class="desc gray">Quần áo rẻ-đẹp-chất lượng</p>
    </div>
    <div class="row gap-4 ">
        <?php foreach($oldProduct as $value):?>
            <div class="card mb-5 col-xl mx-auto cart radius overflow-hidden hidden fromBottom" style="width: 18rem;">
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


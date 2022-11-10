<div class="banner_product m_banner position-relative">
    <div class="position-absolute top-50 start-50 translate-middle start-40 text-white">
            <h1 class='small-title text-center'>#Stayhome</h1>
            <p class='desc mt-4'>Giảm giá đến 70%. Cực shock</p>
        </div>
</div>



<div class="mt-5 content">
    <div class='d-flex justify-content-between align-items-center mb-5'>
        <button class="btn me-2 navbar-toggler background_success rounded-circle p-2 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-funnel-fill"></i>
        </button>
        <form action ='index.php?c=product' method ='POST'class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " name ='input_search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn background_success " name ='btn_search' type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="offcanvas offcanvas-start sidebar-nav bg-light text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <nav class="navbar-light pt-4">
            <ul class='navbar-nav'>
                <li class='mb-1 px-3'>
                    <img src="./access/img/logo.png" alt="">
                </li>
                <li class="mb-5">
                    <hr class='dropdown-divider'/>
                </li>  
                <li>
                    <div class='text-success small fw-bold fs-5 mb-4 text-uppercase px-3'>
                        <i class="bi bi-handbag-fill"></i>
                        Loại
                    </div>
                </li>
                <li>
                    <a href="index.php?c=product" class="nav-link fw-bold text-dark px-3 active">
                        <span class='me-2'>
                        </span>
                        <span>Tất cả</span>
                    </a>
                </li>
                <?php foreach($allCate as $value):?>
                    <li>
                        <a href="index.php?c=product&idCate=<?php echo $value['id']?>" class="nav-link fw-bold text-dark px-3 active">
                            <span class='me-2'>
                            </span>
                            <span><?php echo $value['ten_loai']?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>



    <div class="d-flex flex-wrap align-items-center justify-content-center gap-4">
        <?php foreach($allProduct as $value):?>
            <div class="card mb-5 radius cart  overflow-hidden" style="width: 18rem;">
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
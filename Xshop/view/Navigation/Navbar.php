<nav class="navbar navbar-expand-lg navbar-light top-0 width_position bg-light px-5 position-fixed shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="./access/img/logo.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto font-weight gap-3 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?c=product">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?c=aboutus">Về chúng tôi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?c=contact">Liên hệ</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="index.php?c=cart" aria-current="page" href="#">
            <i class="bi bi-bag-fill"></i>

          </a>
        </li>
        <?php if (empty($_SESSION)) { ?>
          <li class="nav-item ">
            <a class="nav-link active" href='login.php' aria-current="page" href="#">
              <i class="bi bi-person-fill"></i>
            </a>
          </li>
          </li>
        <?php } else { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if ($_SESSION['user']['hinh'] == '') { ?>
                <i class="bi bi-person-fill"></i>
              <?php } else { ?>
                <img src="access/img/avatar/<?php echo $_SESSION['user']['hinh'] ?>" class='avatar_if' alt="">
              <?php } ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php?c=account">
                  <i class="bi bi-person"></i>
                  Thông tin tài khoản
                </a></li>
              <li><a class="dropdown-item" href="index.php?c=changePass">
                  <i class="bi bi-wrench-adjustable"></i>
                  Đổi mật khẩu
                </a></li>
              <?php if ($_SESSION['user']['vai_tro'] == "admin") { ?>

                <li><a class="dropdown-item" href="admin.php">
                    <i class="bi bi-people-fill"></i>
                    Admin
                  </a></li>

              <?php } ?>
              <li><a class="dropdown-item" href="index.php?c=logout">
                  <i class="bi bi-box-arrow-right"></i>
                  Đăng xuất
                </a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed caption above">
  <div class="container-fluid">
    <button class="btn me-2 navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand fs-3 font-weight" href="#">
      X-Shop
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex ms-auto">
        <div class="input-group my-2">
        </div>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?c=account">
              <i class="bi bi-person"></i>
              Thông tin
            </a></li>
            <li><a class="dropdown-item" href="index.php">
              <i class="bi bi-file-earmark-break"></i>
              Pages
            </a></li>
            <li><a class="dropdown-item" href="index.php?c=logout">
              <i class="bi bi-box-arrow-right"></i>
              Đăng xuất
            </a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <nav class="navbar-dark">
      <ul class='navbar-nav'>
        <li>
          <div class='text-muted small fw-bold text-uppercase px-3'>
              CORE
          </div>
        </li>
        <li>
          <a href="admin.php" class="nav-link text-muted px-3 active">
            <span class='me-2'>
              <i class="bi bi-columns-gap"></i>
            </span>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="my-4">
          <hr class='dropdown-divider'/>
        </li>

        <li>
          <div class='text-muted small fw-bold text-uppercase px-3'>
              CONTROLls
          </div>
        </li>
        <li>
          <a href="admin.php?c=users" class="nav-link text-muted px-3 active">
            <span class='me-2'>
              <i class="bi bi-person-circle"></i>
            </span>
            <span >Users</span>
          </a>
        </li>
        <li>
          <a href="admin.php?c=products" class="nav-link text-muted px-3 active">
            <span class='me-2'>
              <i class="bi bi-box-seam-fill"></i>
            </span>
            <span>Products</span>
          </a>
        </li>
        <li>
          <a href="admin.php?c=categories" class="nav-link text-muted px-3 active">
            <span class='me-2'>
              <i class="bi bi-menu-button-wide"></i>
            </span>
            <span>Categories</span>
          </a>
        </li>   
        <li>
          <a href="admin.php?c=comments" class="nav-link text-muted px-3 active">
            <span class='me-2'>
              <i class="bi bi-chat"></i>
            </span>
            <span>Comments</span>
          </a>
        </li>      
      </ul>
    </nav>
</div>
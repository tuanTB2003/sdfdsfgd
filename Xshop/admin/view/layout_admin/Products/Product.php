<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm caption-ifor">
  <h1 class='fs-4 rounded navbar-brand'>Danh sách sản phẩm</h1>
  <div class="input-group gap-2">
    <form class="d-flex ms-auto gap-2" action='admin.php?c=products' method="post">
      <div class="input-group ">
        <input type="text " class="form-control " name='input_search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <select class="form-select form_filter" name='filter_cate' aria-label="Default select example">
          <option value='0'>Tất cả</option>
          <?php foreach ($allCategories as $value) : ?>
            <option value="<?php echo $value["id"] ?>"><?php echo $value["ten_loai"] ?> </option>
          <?php endforeach; ?>
        </select>
        <button class="btn btn-outline-secondary" name='btn_search' type="submit" id="button-addon2">
          <i class="bi bi-search"></i>
        </button>
      </div>

    </form>
    <div class='my-auto  '>
      <a href='admin.php?c=addProduct'>
        <button class="btn btn-outline-secondary">Thêm mới</button>
      </a>
    </div>
  </div>
</div>
<table class="table px-3 mt-4 table-hover align-middle table-striped text-center shadow-sm rounded bg-white">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giảm giá</th>
      <th scope="col">Lượt xem</th>
      <th scope="col">loại</th>
      <th class='d-flex  justify-content-center' scope="col">Sửa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allProduct as $key => $value) : ?>
      <tr>
        <th scope="row"><?php echo $key + 1 ?></th>
        <td class='d-flex align-items-center justify-content-start gap-3 pl-3'>
          <img class='img' src="./access/img/products/<?php echo $value["hinh"] ?>" alt="">
          <?php echo $value["ten_hh"] ?>
        </td>
        <td><?php echo number_format($value["gia"], 0, '', ',') ?> vnđ</td>
        <td><?php echo $value["so_luong"] ?></td>
        <td><?php echo $value["giam_gia"] ?></td>
        <td><?php echo $value["so_luot_xem"] ?></td>
        <td><?php echo $value["ten_loai"] ?></td>
        <td>
          <div class="d-flex gap-2 justify-content-center">
            <a href="admin.php?c=editProduct&id=<?php echo $value["id"] ?>">
              <button class="btn btn-primary">Chỉnh sửa</button>

            </a>
            <a href="admin.php?c=deleteProduct&id=<?php echo $value["id"] ?>">
              <button class="btn btn-danger">Xóa</button>

            </a>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
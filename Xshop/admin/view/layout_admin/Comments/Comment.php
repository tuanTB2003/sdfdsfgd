<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm caption-ifor">
    <h1 class='fs-4 rounded navbar-brand'>Danh sách bình luận</h1>
    <div class="input-group gap-2">
        <form action='admin.php?c=searchCmt' method='post' class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " name='search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" name='submitSearch' type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<table class="table px-3 mt-4 table-hover align-middle table-striped text-center shadow-sm rounded bg-white">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">Hàng hóa</th>
      <th scope="col">Số lượng bình luận</th>
      <th class='d-flex  justify-content-center' scope="col">Sửa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allCmts as $key => $value): ?>
      <tr>
        <th scope="row"><?php echo $key + 1?></th>
        <td class='d-flex align-items-center gap-3'>
          <img class='img' class='' src="./access/img/products/<?php echo $value["hinh"]?>" alt="">
          <?php echo $value["ten_hh"]?>
        </td>
        <td><?php echo  $value["so_luong"]?></td>
        <td>
          <div class="d-flex gap-2 justify-content-center">
            <a href="admin.php?c=detailCmt&id=<?php echo $value['id']?>">
              <button class="btn btn-primary">Chi tiết</button>
            </a>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
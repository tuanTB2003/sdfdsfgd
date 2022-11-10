<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm mb-4 caption-ifor">
    <h1 class='fs-4 rounded navbar-brand'>Danh sách khách hàng</h1>
    <div class="input-group gap-2">
        <form action ='admin.php?c=users' method='post' class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " name='input_search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" name='btn_search' type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <div class='my-auto  '>
          <a href="admin.php?c=addUser">
            <button class="btn btn-outline-secondary">Thêm mới</button>

          </a>
        </div>
    </div>
</div>
<table class="table px-3 table-hover align-middle table-striped text-center shadow-sm rounded bg-white">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Email</th>
      <th scope="col">Chức vụ</th>
      <th class='d-flex  justify-content-center' scope="col">Sửa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allUser as $key => $value):?>
      <tr>
        <th scope="row"><?php echo $key+1; ?></th>
        <td>
          <img class='avatar-img' src="./access/img/avatar/<?php echo $value['hinh']?>" alt="">
          <?php echo $value["ho_ten"]; ?>
        </td>
        <td><?php echo $value["email"]; ?></td>
        <td><?php echo $value["vai_tro"]; ?></td>
        <td>
          <div class="d-flex gap-2 justify-content-center">
            <a href="admin.php?c=editUser&id=<?php echo $value["id"]?>">
              <button class="btn btn-primary">Chỉnh sửa</button>

            </a>
            <?php if(!($_SESSION['user']['id'] == $value['id'])){?>
            <a href="admin.php?c=deleteUser&id=<?php echo $value["id"]?>">
              <button class="btn btn-danger">Xóa</button>
            </a>
            <?php }else{echo '';}?>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm caption-ifor">
    <h1 class='fs-4 rounded navbar-brand'>Danh sách sản phẩm</h1>
    <div class="input-group gap-2">
        <form action ='admin.php?c=categories' method ='POST'class="d-flex ms-auto ">
            <div class="input-group mr-2">
                <input type="text " class="form-control " name ='input_search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" name ='btn_search' type="submit" id="button-addon2">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <div class='my-auto  '>
          <a href="admin.php?c=addCate">
            <button class="btn btn-outline-secondary">Thêm mới</button>
            
          </a>
        </div>
    </div>
</div>
<table class="table px-3 mt-4 table-hover align-middle table-striped text-center shadow-sm rounded bg-white">
  <thead>
    <tr >
      <th scope="col">#</th>
      <th scope="col">Tên loại</th>
      <th class='d-flex  justify-content-center' scope="col">Sửa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allCategories as $key => $value):?>
      <tr>
        <th scope="row"><?php echo $key +1 ?></th>
        <td><?php echo $value['ten_loai'] ?></td>
        <td>
          <?php if($value['id'] != 29){?>
          <div class="d-flex gap-2 justify-content-center">
            <a href="admin.php?c=editCate&id=<?php echo $value["id"]?>">
              <button class="btn btn-primary">Chỉnh sửa</button>
            </a>
            <a href='admin.php?c=deleteCate&id=<?php echo $value["id"]?>">'>
              <button class="btn btn-danger">Xóa</button>

            </a>
          </div>
          <?php }else{echo'';}?>
        </td>
      </tr>
    <?php endforeach?>
  </tbody>
</table>

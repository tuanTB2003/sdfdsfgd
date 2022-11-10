<div class="navbar navbar-expand-lg bg-white rounded px-3 shadow-sm caption-ifor">
    <h1 class='fs-4 rounded navbar-brand'>Chi tiết bình luận</h1>
    <div class="input-group gap-2">
        <form class="d-flex ms-auto " action = 'admin.php?c=SearchDetailRep' method="post">
            <div class="input-group mr-2">
              <input type="text " hidden class="form-control " name='idhh' value='<?php echo $idhh?>' >
              <input type="text " hidden class="form-control " name='idbl' value='<?php echo $idbl?>' >
              <input type="text " class="form-control " name='search' placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" name='submit' type="submit" id="button-addon2">
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
      <th scope="col">Nội dung bình luận</th>
      <th class='d-flex  justify-content-center' scope="col">Action</th>
      <th  scope="col">Ẩn</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($user as $key => $value): ?>
      <tr>
        <th scope="row"><?php echo $key + 1?></th>
        <td >
          <?php echo $value["noi_dung"]?>
        </td>
        <td>
          <div class="d-flex gap-2 justify-content-center">
            <a href="admin.php?c=deleteRep&id=<?php echo $value['id']?>&idbl=<?php echo $value['id']?>&idhh=<?php echo $idhh?>">
              <button class="btn btn-danger">Xóa</button>
            </a>
          </div>
        </td>
        <?php if($value['an'] != 0){?>
          <td>
          <a href="admin.php?c=showRepCmt&id=<?php echo $value['id_binh_luan']?>&idhh=<?php echo $idhh?>&idrep=<?php echo $value['id']?>">
              <button class="btn btn-secondary">Hiện</button>
          </a>
        </td>
        <?php }else{?>
        <td>
          <a href="admin.php?c=hideRepCmt&id=<?php echo $value['id_binh_luan']?>&idhh=<?php echo $idhh?>&idrep=<?php echo $value['id']?>">
              <button class="btn btn-secondary">Ẩn</button>
          </a>
        </td>
        <?php }?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
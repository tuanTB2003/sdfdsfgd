<div class='d-flex justify-content-between align-items-center flex-wrap gap-4'>
    <a href='' class='shadow-lg text-decoration-none text-dark rounded p-4'>
        <h3>Sản phẩm</h3>
        <div class='d-flex gap-2'>Số lượng :<p class="chart"><?php echo $pr[0]['so_luong']?></p></div>
    </a>
    <a href='' class='shadow-lg text-decoration-none text-dark rounded p-4'>
        <h3>Loại hàng</h3>
        <div class='d-flex gap-2'>Số lượng: <p class="chart"><?php echo $cate[0]['so_luong']?></p></div>
    </a>
    <a href='' class='shadow-lg text-decoration-none text-dark rounded p-4'>
        <h3>Người dùng</h3>
        <div class='d-flex gap-2'>Số lượng: <p class="chart"><?php echo $user[0]['so_luong']?></p></div>
    </a>
    <a href='' class='shadow-lg text-decoration-none text-dark rounded p-4'>
        <h3>Bình luận</h3>
        <div class='d-flex gap-2'>Số lượng: <p class="chart"><?php echo $cmt[0]['so_luong']?></p> </div>
    </a>
</div>

<div class='mt-5'>
  <h3>Thống kê số lượng</h3>
  <canvas id="myChart"></canvas>
</div>

<div class="mt-5">
    <h3>Thống kê danh mục</h3>
    <table class="table mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Tên loại</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá bé nhất</th>
            <th scope="col">Giá lớn nhất</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $key => $value):?>
                <tr>
                    <th scope="row"><?php echo $key + 1?></th>
                    <td class='cate'><?php echo $value['ten_loai']?></td>
                    <td class ='data_quantity'><?php echo $value['so_luong_sp']?></td>
                    <td><?php echo number_format($value['minGia'], 0, '',',')  ?> vnđ</td>
                    <td><?php echo number_format($value['maxGia'], 0, '',',') ?> vnđ</td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
</div>
<div class='mt-5 chart2'>
  <canvas id="myChart2"></canvas>

</div>
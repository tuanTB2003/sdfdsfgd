<div class="banner_product m_banner position-relative">
    <div class="position-absolute top-50 start-50 translate-middle start-40 text-white">
            <h1 class='small-title text-center'>#Contact us</h1>
            <p class='desc mt-4'>Liên hệ với chúng tôi</p>
        </div>
</div>

<div class="content m_top">
    <h3 class='mb-3'>Liên hệ</h3>
    <div class='row'>
        <form class='col-md-6' action='index.php?c=contact' method='post'>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-floating">
            <textarea name='cmt' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Nội dung</label>
            <p class="err"><?php echo $err?></p>
          </div>
          <button type="submit" name='submit' class="btn btn-primary mt-5">Submit</button>
        </form>
        <div class='col-md-6 mt-5' >
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex gap-2">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>Đường Trịnh Văn Bô, Nam Từ Liêm</div>
                </li>
                <li class="list-group-item d-flex gap-2">
                    <i class="bi bi-phone"></i>
                    <div>+0263648486</div>
                </li>
                <li class="list-group-item d-flex gap-2">
                    <i class="bi bi-envelope"></i>
                    <div>cara@gmail.com</div>
                </li>
            </ul>
        </div>
    </div>

</div>
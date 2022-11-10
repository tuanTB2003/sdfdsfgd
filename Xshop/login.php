<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./view/css/login.css">
</head>
<?php include './view/Login/C_login.php'?>
<body class='d-flex justify-content-center align-items-center'>
    <div class='form_shadow form_login rounded-5 p-4'>
        <div class='text-center mb-4 '>
            <img src="./access/img/logo.png" alt="">
        </div>
        <div class='mb-4'>
            <h3 class='text-muted fst-italic mb-3'>Chào mừng đến với Cara</h3>
            <p class='text-muted fst-italic'>Hãy đăng nhập tài khoản của bạn và bắt đầu mua hàng.</p>
        </div>
        <?php echo $err != "" ?  "
            <div class='alert alert-danger' role='alert'>
                Lỗi: $err
            </div>
        "
        :
        
        ''
        ?>
        <form action='login.php' method='post'>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-muted f-13">Email</label>
                <input type="email"  name='email' required class="form-control f-13 py-2" placeholder="Nhập Email..." id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-muted f-13">Mật khẩu</label>
                <input type="password" name='pass' class="form-control f-13 py-2" placeholder="Nhập mật khẩu..." id="exampleInputPassword1">

            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input"  id="exampleCheck1">
                <label class="form-check-label f-13" for="exampleCheck1">Nhớ mật khẩu</label>
            </div>
            <button type="submit" name='btn_login' class="btn background_success text_success fw-bold w-full">Đăng nhập</button>
        </form>
        <div class='my-4'>
            <hr class='dropdown-divider'/>
        </div>
        <div class='text-center f-13'>
            <p>Bạn là người mới ? <a href="register.php" class='text-decoration-none fw-bold'>Đăng kí</a> ngay</p>
        </div>
    </div>
</body>
</html>
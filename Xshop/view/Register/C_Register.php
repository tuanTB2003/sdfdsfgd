<?php
    session_start();
    include './model/database.php';
    include './model/register.php';
    if(!empty($_SESSION)){
        if($_SESSION['user']){
            header('Location: index.php');
        }
    }

    $err ='';
    if(isset($_POST["btn_register"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $check = checkEmail($email);
        $comfirmPass = $_POST["comfirmPass"];
        if($email == '' || $pass =='' || $name == '' || $comfirmPass == ''){
            $err = 'Vui lòng không bỏ trống';
        }else if(is_array($check)){
            $err = 'Tài khoản đã tồn tại';
        }else if($comfirmPass != $pass){
            $err = 'Mật khẩu không trùng khớp';
        }else{
            createAccount($email,$name,$pass);
            header('Location: login.php');
        }
    }
?>
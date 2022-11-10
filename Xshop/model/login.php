<?php

    function checkUser($email,$pass){
        $sql = "SELECT * FROM khach_hang WHERE email = '$email' AND mat_khau = '$pass'";
        $data = pdo_query_one($sql);
        return $data;
    }
?>
<?php
function createAccount($email, $userName, $password){
    $sql = "INSERT INTO khach_hang (ho_ten, mat_khau, email, vai_tro)
     VALUES('$userName','$password','$email','user')";
    pdo_execute($sql);
}


function checkEmail($email){
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    return pdo_query_one($sql);
}

?>
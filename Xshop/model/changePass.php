<?php 
    function oldPass($idUser){
        $sql = "SELECT mat_khau FROM khach_hang WHERE id = '$idUser'";
        return pdo_query_one($sql);
    }
    function changePass($idUser,$newPass){
        $sql ="UPDATE khach_hang SET mat_khau = '$newPass' WHERE id = '$idUser'";
        pdo_execute($sql);
    }
?>
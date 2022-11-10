<?php
    function getAllUsers($inputSearch){
        $sql = "SELECT * FROM khach_hang where ho_ten like '%$inputSearch%'";
        return pdo_query($sql);
    }
    function deleteUser($id){
        $sql = "DELETE FROM khach_hang WHERE id = '$id'";
        pdo_execute($sql);
        return getAllUsers($all ='');
    }
    function getOneUser($id){
        $sql = "SELECT * FROM khach_hang WHERE id = '$id'";
        return pdo_query_one($sql);
    }

    function updateUser($id, $name,$img,$role){
        if($img != ""){
            $sql = "UPDATE khach_hang SET ho_ten = '$name', hinh = '$img', vai_tro ='$role' WHERE id ='$id'";

        }else{
            $sql = "UPDATE khach_hang SET ho_ten = '$name', vai_tro ='$role' WHERE id ='$id'";

        }
        pdo_execute($sql);
        return getOneUser($id);
    }

    function addNewUser($name, $img, $role, $email, $pass){
        $sql = "INSERT INTO khach_hang(ho_ten, mat_khau, email, hinh, vai_tro)
         VALUES('$name', '$pass', '$email','$img','$role')";
        pdo_execute($sql);
    }
    function checkEmailUser($email){
        $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
        return pdo_query_one($sql);
    }
?>
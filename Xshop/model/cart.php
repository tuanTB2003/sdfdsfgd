<?php 
    function addToCart($name, $price, $img, $idUser,$id,$quantity){
        $sql = "INSERT INTO gio_hang(ten_san_pham, gia, hinh, id_kh,id_hh,so_luong) 
        VALUES('$name','$price','$img','$idUser','$id','$quantity')";
        pdo_execute($sql);
    }
    function getCartUser($idUser){
        $sql ="SELECT gio_hang.id_hh, gio_hang.id,gio_hang.so_luong, gio_hang.hinh,gio_hang.ten_san_pham,
         gio_hang.gia,hang_hoa.giam_gia as 'giam_gia'
         FROM gio_hang INNER JOIN hang_hoa ON gio_hang.id_hh = hang_hoa.id
         WHERE id_kh ='$idUser'";
        return pdo_query($sql);
    }
    function deletePrCart($id,$idUser){
        $sql ="DELETE FROM gio_hang WHERE id ='$id'";
        pdo_execute($sql);
        return getCartUser($idUser);
    }
    function deleteAllCart($idUser){
        $sql = "DELETE FROM gio_hang WHERE id_kh = '$idUser'";
        pdo_execute($sql);
        return getCartUser($idUser);
    }
    function updateQuantityDatabasey($id,$soluong,$idUser){
        $sql = "UPDATE gio_hang SET so_luong ='$soluong ' WHERE id_hh='$id'";
        pdo_execute($sql);
        return getCartUser($idUser);
    }
    function changeQuantity($id,$quantity,$idUser){
        $sql = "UPDATE gio_hang SET so_luong ='$quantity' WHERE id='$id'";
        pdo_execute($sql);
        return getCartUser($idUser);
    }
?>
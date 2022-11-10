<?php
    
    function loadNewsProduct(){
        $sql = "SELECT * FROM hang_hoa where 1 order by id desc limit 4";
        return pdo_query($sql);
    }
    function loadOldsProduct(){
        $sql = "SELECT * FROM hang_hoa where 1 order by id asc limit 4";
        return pdo_query($sql);
    }
    function loadAllProduct($inputSearch){
        $sql = "SELECT * FROM hang_hoa";
        if($inputSearch != ""){
            $sql .= " WHERE ten_hh LIKE '%$inputSearch%'";
        }
        return pdo_query($sql);
    }

    function filterCate($id){
        $sql = "SELECT * FROM hang_hoa WHERE idCate = '$id'";
        return pdo_query($sql);
    }
    function loadOne($id){
        $sql = "SELECT * FROM hang_hoa WHERE id = '$id'";
        return pdo_query($sql);
    }

    function relatedProduct($idCate, $id){
        $sql = "SELECT * FROM hang_hoa WHERE NOT id = '$id' AND (idCate = '$idCate') LIMIT 4";
        return pdo_query($sql);
    }
    function viewProduct($id){
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE id = '$id'";
        pdo_execute($sql);
    }
?>
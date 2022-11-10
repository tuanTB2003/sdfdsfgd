<?php
    function addNew($name){
        $sql = "INSERT INTO loai(ten_loai) VALUES('$name')";
        pdo_execute($sql);

    }
    function deleteCategory($id){
        $sql = "DELETE FROM loai WHERE id = '$id'";
        pdo_execute($sql);
        $sql2 = "UPDATE hang_hoa SET idCate = 29 WHERE idCate ='$id'";
        pdo_execute($sql2);
        $sql = "SELECT * FROM loai";
        return pdo_query($sql);
    }
    function getAll($inputSearch){
        $sql = "SELECT * FROM loai ";
        if($inputSearch != ""){
            $sql .= " WHERE ten_loai LIKE '%$inputSearch%'";
        }
        return pdo_query($sql);
    }

    function updateCategory($id,$category){
        $sql = "UPDATE loai set ten_loai = '$category' WHERE id = '$id'";
        pdo_execute($sql);
        $sql = "SELECT * FROM loai WHERE id = '$id'";
        return pdo_query_one($sql);
    }
    function getOne($id){
        $sql = "SELECT * FROM loai WHERE id = '$id'";
        return pdo_query_one($sql);
    }

    function checkCate($cate){
        $sql = "SELECT * FROM loai WHERE ten_loai = '$cate'";
        return pdo_query_one($sql);
    }
    
?>
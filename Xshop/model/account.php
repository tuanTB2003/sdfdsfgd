<?php
    function getOneInfor($id){
        $sql = "SELECT * FROM khach_hang WHERE id = '$id'";
        return pdo_query_one($sql);
    }
    function updateInforUSer($id,$name,$img){
        if($img != ''){
            $sql = "UPDATE khach_hang SET ho_ten ='$name',hinh ='$img' WHERE id='$id'";
        }else{
            $sql = "UPDATE khach_hang SET ho_ten ='$name' WHERE id='$id'";
        }
        pdo_execute($sql);
        return getOneInfor($id);
    }

    
?>
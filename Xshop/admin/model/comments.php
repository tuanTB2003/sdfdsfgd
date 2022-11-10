<?php 
    function getProductCmt($value){
        $sql = "SELECT hang_hoa.ten_hh,hang_hoa.id, hang_hoa.hinh, COUNT(*) AS 'so_luong'
        FROM binh_luan INNER JOIN hang_hoa
        ON binh_luan.id_hh = hang_hoa.id WHERE hang_hoa.ten_hh like '%$value%' GROUP BY hang_hoa.ten_hh, hang_hoa.hinh";
        return pdo_query($sql);
    }
    function deleteCmt($id){
        $sql = "DELETE FROM binh_luan WHERE id = $id";
        $sql2 = "DELETE FROM rep_cmt WHERE id_binh_luan = $id";
        pdo_execute($sql);
        pdo_execute($sql2);
        return getProductCmt($all = '');
    }
    
    function getCmtInProduct($id,$search){
        $sql = "SELECT * FROM binh_luan WHERE id_hh = '$id' AND noi_dung like '%$search%'";
        return pdo_query($sql);
    }
    function getCmt( $idhh){
        $sql = "SELECT *, COUNT(id_kh) as so_luong FROM 
        rep_cmt WHERE  id_hh = '$idhh'";
        return pdo_query($sql);

    }
    function responCmt($id){
        $sql = "SELECT * FROM rep_cmt WHERE id_binh_luan = '$id'";
        return pdo_query($sql);
    }
    function deleteRep($id){
        $sql  = "DELETE FROM rep_cmt WHERE id = '$id'";
        pdo_execute($sql);
    }
    function hideCmt($id,$idhh){
        $sql = "UPDATE binh_luan SET an = 1 WHERE id = '$id'";
        pdo_execute($sql);
        return getCmtInProduct($idhh,$all = '');
    }
    function showCmt($id,$idhh){
        $sql = "UPDATE binh_luan SET an = 0 WHERE id = '$id'";
        pdo_execute($sql);
        return getCmtInProduct($idhh,$all = '');
    }

    function hideRepCmt($id){
        $sql = "UPDATE rep_cmt SET an = 1 WHERE id = '$id'";
        pdo_execute($sql);
    }
    function showRepCmt($id){
        $sql = "UPDATE rep_cmt SET an = 0 WHERE id = '$id'";
        pdo_execute($sql);
    }

?>
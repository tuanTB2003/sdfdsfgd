<?php
    function cmt($idHH){
        $sql = "SELECT binh_luan.id,binh_luan.an,binh_luan.noi_dung, khach_hang.hinh, khach_hang.ho_ten, binh_luan.ngay_bl 
        FROM binh_luan INNER JOIN khach_hang ON binh_luan.id_kh = khach_hang.id 
        INNER JOIN hang_hoa ON binh_luan.id_hh = hang_hoa.id WHERE binh_luan.id_hh = '$idHH';
        ";
        return pdo_query($sql);
    }
    function sendCmt($idUser, $idHH, $cmt,$date){
        $sql = "INSERT INTO binh_luan(id_kh,id_hh,noi_dung,ngay_bl,an)
        VALUE('$idUser','$idHH','$cmt','$date',0)";
        pdo_execute($sql);
        return cmt($idHH);
    }
    function getRepCmt($idHH){
        $sql = "SELECT rep_cmt.id_binh_luan,rep_cmt.an, rep_cmt.noi_dung, khach_hang.hinh, khach_hang.ho_ten, rep_cmt.ngay_binh_luan 
        FROM rep_cmt INNER JOIN khach_hang ON rep_cmt.id_kh = khach_hang.id 
        INNER JOIN hang_hoa ON rep_cmt.id_hh = hang_hoa.id WHERE rep_cmt.id_hh = '$idHH'";
        return pdo_query($sql);
    }
    function addRepCmt($idHH,$idUser, $idrep,$valueCmt,$date){
        $sql = "INSERT INTO rep_cmt(id_kh,id_hh,noi_dung,ngay_binh_luan,id_binh_luan,an) 
        VALUE('$idUser','$idHH','$valueCmt','$date','$idrep',0)";
        pdo_execute($sql);
        return getRepCmt($idHH);
    }
   
    
?>
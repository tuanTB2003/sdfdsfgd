<?php
    function getNumberProduct(){
        $sql = "SELECT COUNT(*) as 'so_luong' FROM hang_hoa";
        return pdo_query($sql);
    }
    function getNumberCate(){
        $sql = "SELECT COUNT(*) as 'so_luong' FROM loai";
        return pdo_query($sql);
    }
    function getNumberUser(){
        $sql = "SELECT COUNT(*) as 'so_luong' FROM khach_hang";
        return pdo_query($sql);
    }
    function getNumberCmt(){
        $sql = "SELECT COUNT(*) as 'so_luong' FROM binh_luan";
        return pdo_query($sql);
    }
    function statistical(){
        $sql = "SELECT loai.ten_loai, COUNT(hang_hoa.id) as so_luong_sp, min(hang_hoa.gia) as minGia, 
        max(hang_hoa.gia) as maxGia FROM hang_hoa INNER JOIN loai 
        ON loai.id = hang_hoa.idCate GROUP BY loai.id";
        return pdo_query($sql);
    }
?>
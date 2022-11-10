<?php
    function addNewProduct($nameProduct, $priceProduct,$quantityProduct, $date, $categoryProduct,
     $condition,$descProduct,$imgProduct){
        $sql = "INSERT INTO hang_hoa(ten_hh, gia,so_luong, ngay_nhap, idCate,dac_biet,mo_ta,hinh) 
        VALUES('$nameProduct', '$priceProduct','$quantityProduct','$date','$categoryProduct',
        '$condition','$descProduct','$imgProduct')";
        pdo_execute($sql);
    }
    function deleteProduct($id){
        $sql = "DELETE FROM hang_hoa WHERE id = '$id'";
        pdo_execute($sql);
        $sql2 = "DELETE FROM binh_luan WHERE id_hh = $id";
        pdo_execute($sql2);
        $sql3 = "DELETE FROM rep_cmt WHERE id_hh = $id";
        pdo_execute($sql3);
        $sql = "SELECT * FROM hang_hoa";
        return pdo_query($sql);
    }
    function getAllProduct($filterCate, $inputSearch){
        $sql = "SELECT hang_hoa.id,hang_hoa.ten_hh,hang_hoa.hinh,hang_hoa.gia,hang_hoa.so_luong,
        hang_hoa.giam_gia, loai.ten_loai,hang_hoa.so_luot_xem
         FROM hang_hoa INNER JOIN loai ON hang_hoa.idCate = loai.id";
        if($inputSearch != ""){
            $sql .= " WHERE ten_hh LIKE '%$inputSearch%'";
        }
        if($filterCate != 0){
            $sql .= " WHERE idCate = '$filterCate'";
        }
        return pdo_query($sql);
        
    }

    
    function getOneProduct($id){
        $sql = "SELECT * FROM hang_hoa WHERE id = '$id'";
        return pdo_query_one($sql);
    }
    function updateProduct($id,$name, $price, $quantity, $date, $check, $condition, $discount,
    $category, $imgUpdate , $desc){
        if($imgUpdate != ''){
            $sql = "UPDATE hang_hoa set ten_hh = '$name', giam_gia ='$discount', ngay_nhap ='$date' ,
            hinh='$imgUpdate', dac_biet ='$condition', so_luot_xem = '$check', mo_ta ='$desc',
            gia ='$price', idCate ='$category', so_luong ='$quantity' WHERE id = '$id'";

        }else{
            $sql = "UPDATE hang_hoa set ten_hh = '$name', giam_gia ='$discount', ngay_nhap ='$date' , dac_biet ='$condition', so_luot_xem = '$check', mo_ta ='$desc',
            gia ='$price', idCate ='$category', so_luong ='$quantity' WHERE id = '$id'";
        }
        pdo_execute($sql);
        $sql = "SELECT * FROM hang_hoa WHERE id = '$id'";
        return pdo_query_one($sql);
    }

<?php 

    function loadAllCategories(){
        $sql = "SELECT * FROM loai";
        return pdo_query($sql);
    }

?>
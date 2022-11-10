<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="admin/view/layout_admin/Nav-bar/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php 
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['user']['vai_tro'] != 'admin'){
            header('Location: index.php');
        }
    }else{
        header('Location: index.php');
    }
?>
<body>
    <div class="main">
        <?php include "admin/view/layout_admin/Nav-bar/Nav_bar.php"?>
        <div class=" px-4 content">
            <?php include "admin/view/layout_admin/Content/Content.php"?>
        </div>
    </div>
    <script>
         
        const datas = [...document.querySelectorAll('.chart')];
        let arr = datas.map((item)=>{
            return parseInt(item.innerText, 10)
        })
        const labels = [
            'Sản phẩm',
            'Loại hàng',
            'Người dùng',
            'Bình luận',
        ];

        const data = {
            labels: labels,
            datasets: [{
            label: '',
            backgroundColor: [
                'rgba(255, 99, 132,0.6)',
                'rgba(243, 2, 32,0.6)',
                'rgba(12, 23, 242,0.6)',
                'rgba(32, 123, 32,0.6)',
            
            ],
            borderColor: 'rgb(255, 99, 132)',
            data: arr,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

// chart 2


        let categories = [...document.querySelectorAll('.cate')];
        let datasQuantity = [...document.querySelectorAll('.data_quantity')];
        let arrData = datasQuantity.map((item)=>{
            return item.innerText
        })
        let arrCate = categories.map((item)=>{
            return item.innerText
        })
        console.log(arrCate);
        const title = arrCate;

        const data2 = {
            labels: title,
            datasets: [{
            label: '',
            backgroundColor:arrCate.map(item =>{
                var o = Math.round, r = Math.random, s = 255;
                return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
            }) ,
            borderColor: 'rgb(255, 99, 132)',
            data: arrData,
            }]
        };

        const config2 = {
            type: 'doughnut',
            data: data2,
            options: {}
        };
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>
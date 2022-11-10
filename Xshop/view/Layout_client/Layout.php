<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARA/<?=isset($_GET['c']) ? $_GET['c'] : "Home"?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./view/css/Home.css">
    <link rel="stylesheet" href="./view/css/Product.css">
    <link rel="stylesheet" href="./view/css/Comment.css">
    <link rel="stylesheet" href="./animation/scroll/scroll.css">
</head>
<?php
    session_start();  
?>
<body class='bg-light'>
    <div class="main">
        <?php include "view/Navigation/Navbar.php"?>
        <?php include "./view/Content/Content.php"?>
        <?php include "./view/Footer/Footer.php"?>
    </div>
    <script src="./animation/scroll/scroll.js"></script>
    <script src="./view/js/formReply.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php 
include './model/database.php';
include './model/products.php';
include './model/categories.php'; 
include './model/comments.php';
include './model/account.php';
include './model/cart.php';
include './model/changePass.php';

$oldProduct = loadOldsProduct();
$topNew = loadNewsProduct();
if(!empty($_SESSION)){
    $idUser=$_SESSION['user']['id'];
    $mycart = getCartUser($idUser);
    $_SESSION['mycart'] = $mycart;
}
$tong_tien = 0;
if(isset($_GET['c'])){
    $view = $_GET['c'];
    switch($view){
        // categories
        case "product":
            $all ="";
            $allCate = loadAllCategories();
            if(isset($_GET['idCate'])){
                $idCate = $_GET['idCate'];
                $allProduct = filterCate($idCate);
            } else if(isset($_POST["btn_search"])){
                $inputSearch = $_POST["input_search"];
                $allProduct = loadAllProduct($inputSearch);
            }else{
                $allProduct = loadAllProduct($all);

            }
            include "./view/ProductsPage/Products.php";
            break;
        case "detail":
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                viewProduct($id);//so luot xem
                $productDetail = loadOne($id);
                $relatedItem = relatedProduct($productDetail[0]["idCate"],$id);
                $cmts2 = cmt($id);
                $idHH= $_GET['id'];
                if(isset($_POST['submit_cmt'])){
                    $cmt = $_POST['comment'];
                    $date = $_POST['date'];
                    if($cmt != ""){
                        $cmts2 = sendCmt($idUser,$idHH,$cmt,$date);
                    }else{
                        $errCmt = "Vui lòng nhập bình luận";
                    }
                }
                $viewRep = getRepCmt($id);
                if(isset($_POST['submit_rep'])){
                    $valueCmt = $_POST['repcmt'];
                    if($valueCmt != ""){
                        $idrep = $_GET['idrep'];
                        $date = $_POST['date'];
                        $viewRep = addRepCmt($idHH,$idUser, $idrep,$valueCmt,$date);

                    }
                }
            }
            include "./view/DetailProduct/Detail.php";

            break;     
        case "logout":
            if($_SESSION["user"]){
                session_unset();
                header('Location: login.php');
            }else{
                header('Location: index.php');
            }
            break;    
        case "account":
            $err ='';
            $currentAcc = getOneInfor($idUser);
            include './view/InforAccount/Account.php';
            break;    
        case "updateAccount":
            $err ='';
            $success ='';
            if(isset($_POST['btn_submit'])){
                $name = $_POST['name'];
                $img = $_FILES["avatar"]["name"];
                if(!$name){
                    $err ='Vui lòng không bỏ trống!!';
                    $currentAcc = getOneInfor($idUser);
                }else{
                    $target_dir = "./access/img/avatar/" ;
                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);     
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                    $currentAcc = updateInforUSer($idUser,$name,$img);
                    $_SESSION["user"]= getOneInfor($idUser);
                    $success = 'thành công';

                }
            }
            include './view/InforAccount/Account.php';
            break; 
        case 'changePass':
            $err = '';
            $success = '';
            if(isset($_POST['btn_submit'])){
                $oldPass = $_POST['oldPass'];
                $newPass = $_POST['newPass'];
                $comfirm = $_POST['comfirm'];
                $checkOld = oldPass($idUser);
                var_dump($checkOld);
                if(!$oldPass || !$newPass || !$comfirm){
                    $err=  'Vui lòng không bỏ trống';

                }else if($oldPass != $checkOld['mat_khau']){
                    $err=  'Mật khẩu sai nhập lại';

                }else if($newPass == $oldPass){
                    $err=  'Mật khẩu mới phải khác mật khẩu cũ';
                }else if($comfirm  != $newPass){
                    $err=  'Xác nhập mật khẩu sai';
                }else{
                    $err ='';
                    changePass($idUser,$newPass);
                    $success = 'Cập nhật thành công';
                }

            }
            include './view/ChangePass/Change.php';
            break;    
        case "cart":
            if(empty($_SESSION)){
                header('Location: login.php');
            }else{
                
                if(isset($_POST['addCart'])){
                    $id = $_POST['idProduct'];
                    $quantity = $_POST['quantity'];
                    $price = $_POST['price'];
                    $img = $_POST['img'];
                    $name = $_POST['name'];
                    $idProduct = $_POST['idProduct'];
                    if(isset($_SESSION['mycart']) && COUNT($_SESSION['mycart']) > 0){
                        foreach($_SESSION['mycart'] as $value){
                            if($value['id_hh'] == $idProduct){
                                $soluong= $value['so_luong'] + $quantity;
                                $mycart = updateQuantityDatabasey($idProduct, $soluong,$idUser);
                                $_SESSION['mycart'] = $mycart;

                            }else{
                                addToCart($name, $price, $img, $idUser,$id,$quantity);      
                                $mycart = getCartUser($idUser);
                                $_SESSION['mycart'] = $mycart;
                            }
                        }
                    }else{
                        addToCart($name, $price, $img, $idUser,$id,$quantity);      
                        $mycart = getCartUser($idUser);
                        $_SESSION['mycart'] = $mycart;
                    }
                }

            }
            include './view/Cart/Cart.php';
            break;    
        case 'deleteCart':
            if(isset($_GET['id'])){
                $id= $_GET['id'];
                $mycart = deletePrCart($id,$idUser);
                $_SESSION['mycart'] = $mycart;
            }
            include './view/Cart/Cart.php';
            break; 
        case 'updateCart':
            if(isset($_POST['submit'])){
                $idProduct = $_POST['idProduct'];
                $quantity=$_POST['quantity'];
                $mycart = changeQuantity($idProduct,$quantity,$idUser);
            }
            header('Location: index.php?c=cart');
            break;
        case 'abate':
            $err = '';
            if(isset($_POST['submit'])){
                $tong_tien = $_POST['tong_tien'];
            }
            include './view/Abate/Abate.php';
            break;
        case 'acceptPayment':
            if(isset($_POST['submit'])){
                foreach($_SESSION['mycart'] as $value){
                    echo $value['gia'];
                    $tien = ($value['gia'] * $value['so_luong']);
                    $tong_tien+=$tien;
                }
                $name  = $_POST['name'];
                $number  = $_POST['number'];
                $address  = $_POST['address'];
                $payment  = $_POST['payment'];
                if(!$name || !$number || !$address ){
                    $err ='Vui lòng điền đầy đủ thông tin!!'; 
                }else if(!preg_match('/^((\+)33|0)[1-9](\d{2}){4}$/',$number)){
                    $err ='Số điện thoại không hợp lệ'; 
                }
                else{
                    $err = '';
                    $_SESSION['mycart'] =deleteAllCart($idUser);
                    header("Location: index.php?c=cart");
                }

            }
            include './view/Abate/Abate.php';
            break;
        case 'aboutus':
            include './view/AboutUs/About.php';
            break;
        case 'contact':
            $err ='';
            if(isset($_POST['submit'])){
                $cmt = $_POST['cmt'];
                if($cmt  == ''){
                    $err ='Vui lòng không bỏ trống';
                }else{
                    $err ='';
                }
            }
            include './view/ContactUs/Contact.php';
            break;

        default :
            include "./view/Home/Home.php";
            break;
    }        

}else{
   
    include "./view/Home/Home.php";
}
?>
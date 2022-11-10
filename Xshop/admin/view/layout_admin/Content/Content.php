<?php
    
    include './admin/model/database.php';
    include './admin/model/categories.php';
    include './admin/model/products.php';
    include './admin/model/users.php';
    include './admin/model/comments.php';
    include './admin/model/dashboard.php';
    $role = [
        "admin" => "admin",
        "user" => "user"
    ];  
    if(isset($_GET['c'])){
        $status = [
            "khong_co" => "Không có",
            "dac_biet" => "Đặc biệt"
        ];
        
        $view = $_GET['c'];
        switch($view){
            // categories
            case "categories":
                if(isset($_POST["btn_search"])){
                    $inputSearch = $_POST["input_search"];
                }else{
                    $inputSearch = "";
                }
                $allCategories = getAll($inputSearch);
                include 'admin/view/layout_admin/Categories/Category.php';
                break;    
            case "addCate":
                $err ='';
                if(isset($_POST["submit"])){
                    $success;
                    $category = $_POST["category"];
                    $check  = checkCate($category);
                    if(!$category){
                        $err = 'Vui lòng không bỏ trống!!';
                    }else if(is_array($check)){
                        $err = 'Loại hàng đã tồn tại';
                    }else{
                        $err ='';
                        addNew($category);
                        $success = "Thêm thành công";
                    }
                }
                include 'admin/view/layout_admin/Categories/AddCategory/AddCate.php';
               
                break;
            case "deleteCate":
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $allCategories=deleteCategory($id);
                    
                }
                include 'admin/view/layout_admin/Categories/Category.php';
               
                break;
            case "editCate":
                $err ='';
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $currenCategory = getOne($id);
                }
                include 'admin/view/layout_admin/Categories/EditCategory/EditCategory.php';
               
                break;  
            case "updateCate":
                if(isset($_POST["updateCate"])){
                    $success;
                    $category = $_POST["category"];
                    $id = $_POST["id"];
                    if(!$category){
                        $err= 'Vui lòng không bỏ trống!!';
                        $currenCategory = getOne($id);
                    }else{
                        $err ='';
                        $currenCategory  = updateCategory($id,$category);
                        $success = "Cập nhật thành công";
                    }
                }
                include 'admin/view/layout_admin/Categories/EditCategory/EditCategory.php';
               
                break;
            //Products
            
            case "products":
                
                if(isset($_POST["btn_search"])){
                    $filterCate = $_POST["filter_cate"];
                    $inputSearch = $_POST["input_search"];
                }else{
                    $filterCate = 0;
                    $inputSearch = "";
                }
                $allProduct = getAllProduct($filterCate, $inputSearch);
                $allCategories = getAll($all ='');
                include 'admin/view/layout_admin/Products/Product.php';
                
                break;
            case "addProduct":
                $err ='';
                $allCategories = getAll($all ='');  
                if(isset($_POST["submit"])){
                    $success;
                    $nameProduct = $_POST["nameProduct"];
                    $priceProduct = $_POST["priceProduct"];
                    $quantityProduct = $_POST["quantityProduct"];
                    $date = $_POST["date"];
                    $categoryProduct = $_POST["categoryProduct"];
                    $condition = $_POST["condition"];
                    $descProduct = $_POST["descProduct"];
                    $imgProduct = $_FILES["imgProduct"]["name"];
                    if(!$nameProduct || !$quantityProduct 
                    ||!$priceProduct || !$imgProduct || !$categoryProduct || !$descProduct ){
                        $err = "Vui lòng nhập đầy đủ!!";
                    }else{
                        $err ='';
                        $target_dir = "./access/img/products/" ;
                        $target_file = $target_dir . basename($_FILES["imgProduct"]["name"]);     
                        move_uploaded_file($_FILES["imgProduct"]["tmp_name"], $target_file);
                        addNewProduct($nameProduct, $priceProduct,
                         $quantityProduct, $date, $categoryProduct, $condition,$descProduct,
                          $imgProduct);
                        $success = "Thêm thành công";
                    }
                }
                include 'admin/view/layout_admin/Products/AddProduct/AddProduct.php';
                break;
            case 'deleteProduct':
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $allProduct= deleteProduct($id);
                }
                include 'admin/view/layout_admin/Products/Product.php';
                break;
            case "editProduct":
                if(isset($_GET["id"])){
                    $err ='';
                    $allCategories = getAll($all ='');
                    $id = $_GET["id"];
                    $currenProduct = getOneProduct($id);
                    $idCate = $currenProduct["idCate"];
                    $categoryProduct = getOne($idCate);
                }
                include 'admin/view/layout_admin/Products/EditProduct/EditProduct.php';
                break;    
            case "updateProduct":
                if(isset($_POST["btn_update"])){
                    $success;
                    // var_dump($_POST);
                    $name = $_POST["name"];
                    $price = $_POST["price"];
                    $quantity = $_POST["quantity"];
                    $date = $_POST["date"];
                    $check = $_POST['check'];
                    $condition = $_POST["condition"];
                    $discount = $_POST["discount"];
                    $category = $_POST["category"];
                    $img = $_FILES["img"]["name"];
                    $desc = $_POST["desc"];
                    $id = $_POST["id"];
                    if(!$name || !$quantity 
                    ||!$price ||  !$desc ){
                        $err = "Vui lòng nhập đầy đủ!!";
                        $currenProduct = getOneProduct($id);
                        $idCate = $currenProduct["idCate"];
                        $categoryProduct = getOne($idCate);
                    }else{
                        $err = "";
                        $target_dir = "./access/img/products/" ;
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);     
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        $currenProduct = updateProduct($id,$name, $price, $quantity, $date, $check, $condition, $discount,
                        $category, $img , $desc);
                        $sql = "SELECT * FROM hang_hoa WHERE id = '$id'";
                        $categoryProduct = getOne($category);
                        $allCategories = getAll($all ='');
                        $success = "Cập nhật thành công";

                    }

                }
                include 'admin/view/layout_admin/Products/EditProduct/EditProduct.php';
                
                break;
            //user
            case 'users':
                $all ='';
                
                $allUser = getAllUsers($all);
                if(isset($_POST['btn_search'])){
                    $inputSearch = $_POST['input_search'];
                    $allUser = getAllUsers($inputSearch);
                }
                include 'admin/view/layout_admin/Users/User.php';
                break; 
            case "deleteUser": 
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $allUser = deleteUser($id);
                }
                include 'admin/view/layout_admin/Users/User.php';
                break;   
            case "editUser":
                $err ='';
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $currentUser = getOneUser($id);
                    $img = $currentUser['hinh'];
                    $hinh = $currentUser['hinh'] != '' ? "access/img/avatar/$img" : 'https://www.thesoupspoon.com/wp-content/uploads/2014/11/user.jpg';
                }
                
                include 'admin/view/layout_admin/Users/EditUser/EditUser.php';
                break;    
                
            case "updateUser":
                    if(isset($_POST["btn_submit"])){
                        $success;
                        $name = $_POST["name"];
                        $id = $_POST["id"];
                        $img = $_FILES["img"]["name"];
                        $role = $_POST['role'];
                        if(!$name){
                            $err = "Vui lòng không bỏ trống";
                            $currentUser = getOneUser($id);
                        }else{
                            $err ='';
                            $target_dir = "./access/img/avatar/" ;
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);     
                            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                            $currentUser = updateUser($id, $name,$img,$role);
                            $success = "Cập nhật thành công";

                        }
                        
                    }
                include 'admin/view/layout_admin/Users/EditUser/EditUser.php';

                break;    
            case "addUser": 
                $err ='';
                if(isset($_POST["btn_submit"])){
                    $success;
                    $name = $_POST["name"];
                    $img = $_FILES["img"]["name"];
                    
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $check = checkEmailUser($email);
                    if(!$name || !$img || !$pass ){
                        $err ='Vui lòng nhập đầy đủ !!';
                    }else if(is_array($check)){
                        $err ='Tài khoản đã tồn tại';
                    }else{
                        $err ='';
                        $role = $_POST['role'];
                        $target_dir = "./access/img/avatar/" ;
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);     
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        
                        addNewUser($name, $img, $role, $email, $pass);
                        $success = "Thêm mới thành công";
                    }
                }
                include 'admin/view/layout_admin/Users/AddUser/AddUser.php';
                break;    
            case "comments":
                $all = '';
                $allCmts = getProductCmt($all);
                include 'admin/view/layout_admin/Comments/Comment.php';
                break;   

            case 'searchCmt':
                if(isset($_POST['submitSearch'])){
                    $search = $_POST['search'];
                    $allCmts = getProductCmt($search);

                }
                include 'admin/view/layout_admin/Comments/Comment.php';
                break;    
            case "deleteCmt": 
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $idhh = $_GET["idhh"];
                    $allCmts = deleteCmt($id);
                    $detailCmt = getCmtInProduct($idhh,$all='');
                    $user = [];
                    if(isset($detailCmt[0]['id_kh'])){
                        $user = getCmt( $idhh);
                    }
                }
                include 'admin/view/layout_admin/Comments/DetailCmt/Detail.php';
                break;  
            case "detailCmt":
                if(isset($_GET["id"])){
                    $idhh = $_GET["id"];
                    $detailCmt = getCmtInProduct($idhh,$search ='');
                    $user = getCmt( $idhh);
                }
                include 'admin/view/layout_admin/Comments/DetailCmt/Detail.php';
                break;  
            case "seachDetailCmt":
                if(isset($_POST["submit"])){
                    $idhh = $_GET["id"];
                    $search = $_POST["search"];
                    $detailCmt = getCmtInProduct($idhh,$search);
                    $user = getCmt( $idhh);
                    
                }
                include 'admin/view/layout_admin/Comments/DetailCmt/Detail.php';
                break; 
            case 'hideCmt':
                if(isset($_GET["id"])){
                    $idbl = $_GET["id"];
                    $idhh = $_GET["idhh"];
                    $detailCmt = hideCmt($idbl,$idhh);
                    $user = getCmt( $idhh);
                }
                include 'admin/view/layout_admin/Comments/DetailCmt/Detail.php';
                break; 
            case 'showCmt':
                if(isset($_GET["id"])){
                    $idbl = $_GET["id"];
                    $idhh = $_GET["idhh"];
                    $detailCmt = showCmt($idbl,$idhh);
                    $user = getCmt( $idhh);
                }
                include 'admin/view/layout_admin/Comments/DetailCmt/Detail.php';
                break;    
            case 'DetailRep':
                if(isset($_GET["id"])){
                    $idbl = $_GET["id"];
                    $idhh = $_GET["idhh"];
                    $user = responCmt($idbl);
                }     
                include 'admin/view/layout_admin/Comments/detailRep/DetailRep.php';
                break;
            case "hideRepCmt":
                if(isset($_GET["id"])){
                    $idbl = $_GET["id"];
                    $idrep = $_GET['idrep'];
                    $idhh = $_GET["idhh"];
                    hideRepCmt($idrep);
                    $user = responCmt($idbl);
                }   
                include 'admin/view/layout_admin/Comments/detailRep/DetailRep.php';
                break;
            case "showRepCmt":
                if(isset($_GET["id"])){
                    $idbl = $_GET["id"];
                    $idhh = $_GET["idhh"];
                    $idrep = $_GET['idrep'];
                    showRepCmt($idrep);
                    $user = responCmt($idbl);
                }   
                include 'admin/view/layout_admin/Comments/detailRep/DetailRep.php';
                break;    
            case 'SearchDetailRep':
                if(isset($_POST["submit"])){
                    $idbl = $_POST["idbl"];
                    $idhh = $_POST["idhh"];
                    $user = responCmt($idbl);
                }     
                include 'admin/view/layout_admin/Comments/detailRep/DetailRep.php';
                break;    
            case 'deleteRep':
                if(isset($_GET["id"])){
                    $id = $_GET["id"];
                    $idbl = $_GET["idbl"];
                    $idhh = $_GET["idhh"];
                    deleteRep($id);
                    $user = responCmt($idbl);
                    
                }     
                include 'admin/view/layout_admin/Comments/detailRep/DetailRep.php';
                break;
            default :
                include 'admin/view/layout_admin/Home/Home.php';
                break;
        }
    }else{
        $pr = getNumberProduct();
        $cate = getNumberCate();
        $user = getNumberUser();
        $cmt = getNumberCmt();
        $categories = statistical();
        include 'admin/view/layout_admin/Home/Home.php';
    }
?>
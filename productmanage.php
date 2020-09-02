<?php

require_once('./includes/class-autoload.php');
require_once('./autologin.php');

$user = new UsersContr();

if(!$user->adminCheck()) {

    header('location: main');

}

// if(isset($_POST['userId'])) {

//     $user->setUserAuth($_POST['userId']);

// }

$data = new ProductsContr();

$view = new ProductsView();

$insertData = new Form();

if (isset($_POST['editProduct'])) {
   
    $result = $data->getProduct($_POST['editProduct']);
    
    //print_r($result);
    $view->productEditPage($result);
    exit();
}

if (isset($_POST['newProduct'])) {


    // $img = time() . $_FILES['imgProd']['name'];
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES['imgProd']['name']);

    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // $extensions_arr = array("jpg","jpeg","png","gif");
    
    // if( in_array($imageFileType,$extensions_arr)) {
    //     move_uploaded_file($_FILES['imgProd']['tmp_name'],$target_dir.$img);
    // } else {
    //     $insertData->setMessage("圖片上傳失敗 =(");

    //     $view->productInsertPage($insertData);
    //     exit();
    // }
    
    $img = $_POST['defaultImg'];
    // echo $_POST['textProdId'];
    // exit();

    $insertData->setProduct($_POST['textProdName'],$_POST['textProdPrice'],$_POST['textProdUnit'],$_POST['textProdDesc'],$img);
    $insertData->setProductId($_POST['textProdId']);

    // print_r($insertData);

    $product = new ProductsContr();
    if($product->modifyProduct($insertData)) {
        header('location: productmanage');
    } else {
        $insertData->setMessage("修改產品失敗 =(");
    }
}


# If above conditions not exist or run finish blow these will be active
# Show product list
$result = $data->getAllProduct();

$view->productManagePage($result);

?>
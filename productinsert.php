<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();

$view = new ProductsView();

if(!$user->adminCheck()) {

    header('location: main');

}

$insertData = new Form();

if(isset($_POST['newProduct'])) {

    /*
    @$check = getimagesize($_FILES['imgProd']);
    if ($check === FALSE) {
        echo "not an image !";
    } else {
       echo "img ok !";
    } 
    */

    # Check image does exist in server
    // if (file_exists($target_file)) {

    //     $insertData->setMessage("圖片重複，換個名字試試？ =(");

    //     $view->productInsertPage($insertData);
    //     exit();
    // }

    # Setup image and file direction
    $img = time() . $_FILES['imgProd']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['imgProd']['name']);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    
    if( in_array($imageFileType,$extensions_arr)) {
        move_uploaded_file($_FILES['imgProd']['tmp_name'],$target_dir.$img);
    } else {
        $insertData->setMessage("圖片上傳失敗 =(");

        $view->productInsertPage($insertData);
        exit();
    }
   
    $insertData->setProduct($_POST['textProdName'],$_POST['textProdPrice'],$_POST['textProdUnit'],$_POST['textProdDesc']);
    $insertData->setProductImg($img);

    $product = new ProductsContr();
    if($product->uploadProduct($insertData)) {
        header('location: productmanage');
    } else {
        $insertData->setMessage("新增產品失敗 =(");
    }

    
}

$view->productInsertPage($insertData);

?>
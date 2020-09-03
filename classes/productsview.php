<?php 

class ProductsView extends Products {

    public function productManagePage($data) {

        $this->title = "商品管理 - 產品列表";

        require_once('./views/adminproductmanage.page.php');
    }

    public function productInsertPage($data) {

        $this->title = "商品管理 - 新增商品";
        $this->tips = "";

        $this->product_id = "";
        $this->product_name = "";
        $this->unit_price = "";
        $this->unit_in_stock = "";
        $this->product_desc = "";
        $this->product_image = "#";
        $this->imgContr = "" ;

        if (isset($data->message)) {
            $this->tips = $data->message;
        }

        require_once('./views/adminproductinsert.page.php');
    }


    public function productEditPage($data) {

        $this->title = "商品管理 - 修改商品";
        $this->tips = "";

        $this->product_id = $data['product_id'] ;
        $this->product_name = $data['product_name'] ;
        $this->unit_price = $data['unit_price'] ;
        $this->unit_in_stock = $data['unit_in_stock'] ;
        $this->product_desc = $data['product_desc'] ;
        $this->product_image = $data['product_image'] ;
        $this->imgContr = "1" ;
        // print_r($data);

        require_once('./views/adminproductinsert.page.php');
    }


    public function productDeletePage() {

        //require_once('./views/adminproductdelete.page.php');
        require_once('./views/adminproductinsert.page.php');
    }



}


?>
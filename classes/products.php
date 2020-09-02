<?php

class Products extends Dbh {

    protected function insertProduct($data) {

        $sql = "INSERT INTO `products` (`product_name`,`unit_price`,`unit_in_stock`,`unit_on_cart`,`product_desc`,`product_image`) 
                VALUES (? ,? ,? ,? ,? ,?)";
        $param = array($data->prodName,$data->prodPrice,$data->prodUnit,$data->prodUnit,$data->prodDesc,$data->prodImg);
        $result = $this->insert($sql, $param);

        return $result; 
    }

    protected function updateProduct($data) {

        print_r($data);

        $sql = "UPDATE `products` SET `product_name` = ? , `unit_price` = ? , `unit_in_stock` = ? , `product_desc` = ? , `product_image` = ?
                WHERE `product_id` = ? ";
        $param = array($data->prodName,$data->prodPrice,$data->prodUnit,$data->prodDesc,$data->prodImg,$data->prodId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    protected function selectAllProduct() {

        $sql = "SELECT * FROM `products`";
        
        $result = $this->selectAll($sql,NULL);

        return $result;
    }

    protected function selectProduct($id) {

        $sql = "SELECT * FROM `products` WHERE `product_id` = ? ";
        $param = array($id);
        $result = $this->select($sql,$param);

        return $result;
    }

}

?>
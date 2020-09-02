<?php

class ProductsContr extends Products {

    public function uploadProduct($product) {

        return $this->insertProduct($product) ? TRUE : FALSE ;

    }

    public function modifyProduct($product) {

        return $this->updateProduct($product) ? TRUE : FALSE ;

    }


    public function getAllProduct() {

        return $this->selectAllProduct();
    }

    public function getProduct($data) {

        return $this->selectProduct($data);
    }



}

?>
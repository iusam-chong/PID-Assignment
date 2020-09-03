<?php

class ProductsContr extends Products {

    public function uploadProduct($product) {

        return $this->insertProduct($product) ? TRUE : FALSE ;

    }

    public function modifyProduct($product) {

        return $this->updateProduct($product) ? TRUE : FALSE ;

    }

    public function offShelfProduct($productId) {

        return $this->deleteProduct($productId) ? TRUE : FALSE ;

    }

    public function getAllProduct() {

        return $this->selectAllProduct();
    }

    public function getProduct($data) {

        return $this->selectProduct($data);
    }

    public function addToCart($productId) {

        return $this->addProdToCart($productId);
    }

    public function cartUnit() {

        return $this->findCartUnit();
    }

    public function getCartItem() {

        return $this->getCart();
    }

}

?>
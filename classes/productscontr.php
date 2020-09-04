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

    public function checkProductQuantity($productId) {

        $row = $this->selectProduct($productId);
        return ($row['unit_in_stock'] > 0) ? TRUE : FALSE ;
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

    public function checkSessionCart() {

        $row = $this->getUser();
        $userId = $row['user_id'];
     
        $currentCart = $this->getCart();
        print_r($currentCart);
        
        # Match SessionCart with UserCart , if the UserCart not null
        # Condition if matched skip the loop , else add product to the user cart
        if (!empty($currentCart)) {
            
            # If user cart not empty , check prodid with user from cart
            # If session cart data not match with db cart, insert a new data
            # addProdToCart method will not allow put a same productId row to db
            foreach ($_SESSION['cart'] as $key => $prodId) {
                
                foreach ($currentCart as $cart) {

                    if ($cart['product_id'] === $prodId) {
                        continue ;

                    } else {
                        $result = $this->addProdToCart($prodId);
                    }
                }
            }
        } else {

            # If user cart is empty, put all session cart item to user cart
            foreach ($_SESSION['cart'] as $key => $prodId) {
                $this->addProdToCart($prodId);
            }
        }
        unset($_SESSION['cart']);
    }

    public function removeCartItem($productId) {

        return $this->deleteFromCart($productId);
    }

    public function billing($data) {

        return $this->bill($data);
    }

}

?>
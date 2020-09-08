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

        //print_r($data);

        $sql = "UPDATE `products` SET `product_name` = ? , `unit_price` = ? , `unit_in_stock` = ? , `product_desc` = ? , `product_image` = ?
                WHERE `product_id` = ? ";
        $param = array($data->prodName,$data->prodPrice,$data->prodUnit,$data->prodDesc,$data->prodImg,$data->prodId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    protected function deleteProduct($id) {

        $sql = "DELETE `products`,`carts` 
                FROM `products` INNER JOIN `carts` ON (carts.product_id = products.product_id) 
                WHERE (products.product_id = ?)";
        $param = array($id);
        $result = $this->insert($sql, $param);

        # code above got bug if no user cart have that product , cant delete it
        $sql = "DELETE `products` FROM `products` WHERE (product_id = ?)";
        $param = array($id);
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

    protected function getUser() {

        $sql = "SELECT `user_id` FROM `user_sessions` WHERE (session_id = ? )";
        $param = array(session_id());
        $row = $this->select($sql, $param);

        return $row;
    }

    protected function addProdToCart($prodId) {

        # Search user Id
        $row = $this->getUser();
        $userId = $row['user_id'];
        
        # Find this product and user from cart table , if exist will RETURN data
        $sql = "SELECT * FROM `carts` WHERE (`user_id` = ?) AND (`product_id` = ?)";
        $param = array($userId, $prodId);
        $status = $this->select($sql, $param);


        
        # Set params following above query result, If found data we renew the data 

        if ($status) {
            // $sql = "UPDATE `carts` SET `quantity` = ? WHERE `cart_id` = ? ";
            // $param = array(($status['quantity']+1), $status['cart_id']);
            return FALSE ;

        } else {
            $sql = "INSERT INTO `carts` (`user_id`, `product_id`, `quantity`) 
                    VALUES (? ,? ,?)";
            $param = array($userId ,$prodId ,1);
        }
        $result = $this->insert($sql, $param);

        return $result;
    }

    protected function findCartUnit() {

        $row = $this->getUser();
        $userId = $row['user_id'];

        # Just show not repeat product
        $sql = "SELECT COUNT(`user_id`) FROM `carts` WHERE (`user_id` = ? )";
        $param = array($userId);
        $result = $this->select($sql,$param);

        return $result['COUNT(`user_id`)'];
    }

    protected function getCart() {

        $row = $this->getUser();
        $userId = $row['user_id'];

        $sql = "SELECT * FROM `carts`, `products` 
                WHERE (products.product_id = carts.product_id) AND (carts.user_id = ? )";
        $param = array($userId);
        $result = $this->selectAll($sql,$param);

        return $result;
    }

    protected function deleteFromCart($prodId) {

        $row = $this->getUser();
        $userId = $row['user_id'];

        $sql = "DELETE FROM `carts` WHERE (`user_id` = ?) AND (`product_id` = ?)";
        $param = array($userId,$prodId);
        $result = $this->insert($sql, $param);

        return $result;
    }

    protected function bill($data) {

        $row = $this->getUser();
        $userId = $row['user_id'];

        foreach ($data as $d) {
        
            $sql = "INSERT INTO `statement` (`user_id`, `product_id`, `product_quantity`) 
                    VALUES(?, ?, ?)";
            $param = array($userId, $d->prodId, $d->prodQuantity);
            $result = $this->insert($sql, $param);

            $sql = "SELECT `unit_in_stock` FROM `products` WHERE (`product_id` = ?)";
            $param = array($d->prodId);
            $result = $this->select($sql,$param);
            
            $newStock = $result['unit_in_stock'] - $d->prodQuantity;

            $sql = "UPDATE `products` SET `unit_in_stock` = ? WHERE `product_id` = ?";
            $param = array($newStock, $d->prodId);
            $result = $this->insert($sql,$param);

            $sql = "DELETE FROM `carts` WHERE (`user_id` = ?)";
            $param = array($userId);
            $result = $this->insert($sql,$param);
            
        }   
    }

    protected function getSoldToday() {
        $sql = "SELECT `product_name`, `unit_price`,SUM(`product_quantity`) AS 'total_quantity',SUM(product_quantity*unit_price) AS 'total_price' 
                FROM statement, products WHERE statement.product_id = products.product_id 
                AND DATE(statement_time) = CURDATE()
                GROUP BY `product_name`,`unit_price` ORDER BY total_price DESC";

        $param = array(NULL);
        $result = $this->selectAll($sql,$param);

        return $result;
    }

    protected function getSoldLastSevenDay() {

        $sql = "SELECT `product_name`, `unit_price`,SUM(`product_quantity`) AS 'total_quantity',SUM(product_quantity*unit_price) AS 'total_price' 
                FROM statement, products WHERE statement.product_id = products.product_id 
                AND statement_time >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY 
                AND statement_time < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY 
                GROUP BY `product_name`,`unit_price` ORDER BY total_price DESC";
        $param = array(NULL);
        $result = $this->selectAll($sql,$param);

        return $result;
    }
}

?>
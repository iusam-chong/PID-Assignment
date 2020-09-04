<?php

class Users extends Dbh {

    # Method of check user is admin or not and return admin data
    protected function isAdmin() {

        $sql = "SELECT * FROM `user_sessions`, `users` 
                WHERE (user_sessions.session_id = ?)
                AND (user_sessions.user_id = users.user_id)
                AND (users.user_type = ?)";
        $param = array(session_id(),'admin');
        $result = $this->select($sql, $param);

        return $result;
    }

    # Method to create a new user to db
    protected function createUser($data): bool {
    
        # do something check function here 
        #
        # maybe?

        # Check username if exist from db then return FALSE
        if ($this->getUser($data->userName)) {
           return FALSE;
        }

        # Password Hash
        $hash = password_hash($data->userPasswd, PASSWORD_DEFAULT);

        # Start insert data into users table
        $sql = "INSERT INTO `users` (`user_name`,`user_passwd`) VALUES (?, ?)";
        $param = array($data->userName, $hash);
        $this->insert($sql, $param);
        # End

        return TRUE;
    }

    # Find user using user_name, if exist return user data, else return value will be NULL
    protected function getUser($userName) {
        
        $sql = "SELECT * FROM users WHERE `user_name` = ?";
        $param = array($userName);
        $row = $this->select($sql, $param);
        
        return $row;
    }

    # Method login
    protected function manualLogin($data): bool {
        
        # Check user if not exist then return FALSE
        $result = $this->getUser($data->userName);
        if (!$result) {
           return FALSE;
        }

        # Check input password with password from db result, if not match return FALSE
        if (!password_verify($data->userPasswd, $result['user_passwd'])) {
            return FALSE;
        }

        # Call session register method
        $this->registerLoginSession($result['user_id']);
       
        return TRUE;
    }

    # Session login, without user manual login
    protected function sessionLogin(): bool {

        # If session has enable/start this should be true
        if(session_status() == PHP_SESSION_ACTIVE) {
            
            # Search conditions if set session from db 
            # And login haven't timeout and user still enabled
            $sql = "SELECT * FROM `user_sessions`, `users` WHERE (user_sessions.session_id = ?) 
                    AND (user_sessions.login_time >= (NOW() - INTERVAL 15 MINUTE)) 
                    AND (user_sessions.user_id = users.user_id) 
                    AND (users.user_enabled = 1)";
            $param = array(session_id());
            $result = $this->select($sql, $param);

            # if query above data exist from db, logged in
            if ($result) {

                # renew login session 
                $this->registerLoginSession($result['user_id']);
                return TRUE;
            }
        }

        # Session login failed
        return FALSE;
    }

    # Save session to db 
    protected function registerLoginSession($userId) {

        # If session has enable/start this should be true
        if(session_status() == PHP_SESSION_ACTIVE) {

            # NOW() is mysql func, not php
            $sql = "REPLACE INTO `user_sessions` (`user_id`, `session_id`, `login_time`) 
                    VALUES (?, ?, NOW())";
            $param = array($userId, session_id());
            $this->insert($sql, $param);
        }
    }

    # Delete session from db, that means logout
    protected function logout() {

        if(session_status() == PHP_SESSION_ACTIVE) {

            $sql = 'DELETE FROM `user_sessions` WHERE (`session_id` = ?)';
            $param = array(session_id());
            $this->insert($sql, $param);
        }
    }

    # Using session id to search customer name // maybe is bank assigment method xD
    protected function getCustomerName() {

        $sql = "SELECT `customer_name` FROM `user_sessions`,`users`,`customers` 
                WHERE (user_sessions.user_id = users.user_id) 
                AND (users.user_id = customers.user_id) 
                AND (session_id = ?)";
        $param = array(session_id());
        $result = $this->select($sql, $param);

        return $result;
    }

    protected function getUserId() {

        $sql = "SELECT `user_id` FROM `user_sessions` WHERE (session_id = ? )";
        $param = array(session_id());
        $row = $this->select($sql, $param);

        return $row;
    }

    # Get All User value from table users
    protected function getAllUser() {

        $sql = "SELECT * FROM `users` WHERE `user_type` = ? ";
        $param = array('user');
        $result = $this->selectAll($sql, $param);

        return $result;
    }

    protected function switchUserAuth($userId) {
        
        $sql = "SELECT * FROM `users` WHERE `user_id` = ? ";
        $param = array($userId);
        $result = $this->select($sql, $param);

        $sql = "UPDATE `users` SET `user_enabled` = ? WHERE `user_id` = ?";
        
        if ($result['user_enabled'] < 1 ){
            $param = array('1',$userId);
        } else {
            $param = array('0',$userId);
        }

        $this->insert($sql, $param);
    }

    # Find user using session Id
    protected function getUserDataBySession() {
        
        $sql = "SELECT * FROM `user_sessions`, `users` 
                WHERE (user_sessions.user_id = users.user_id) 
                AND (user_sessions.session_id = ? )";
        $param = array(session_id());
        $result = $this->select($sql, $param);

        return $result;
    }

    # Get user statement 
    protected function getUserStatement($timestamp) {

        $row = $this->getUserId();
        $userId = $row['user_id'];
        
        $sql = "SELECT p.product_image, p.product_name, p.unit_price ,s.product_quantity 
                FROM statement AS s JOIN products AS p ON s.product_id = p.product_id 
                WHERE s.user_id = ? AND s.statement_time = ?";
        $param = array($userId,$timestamp);
        $result = $this->selectAll($sql, $param);

        // print_r($result);
        // die();
        return $result;
    }

    protected function getStatementTimeList() {

        $row = $this->getUserId();
        $userId = $row['user_id'];

        $sql = "SELECT DISTINCT `statement_time` FROM `statement` WHERE `user_id` = ? ORDER BY statement_time DESC";
        $param = array($userId);
        $result = $this->selectAll($sql, $param);

        return $result;
    }

}

?>
<?php

class Users extends Dbh {

    # Method to create a new user to db
    protected function createUser($data): bool {
        
        # do something check function here 
        #
        #
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

        # Start insert data into customer table
        # get user_id use it relate customer table
        $userId = $this->getId('user_id','users','user_name',$data->userName);

        $sql = "INSERT INTO `customers` (`user_id`,`customer_name`,`customer_id_card`,`customer_phone_number`,`customer_email`) 
                VALUES (?, ?, ?, ?, ?)";
        $param = array($userId, $data->customerName, $data->customerIdCard, $data->customerPhoneNum, $data->customerEmail);
        $this->insert($sql, $param);
        # End

        # Start insert data into account table
        # get customer_id use it relate account table
        $customerId = $this->getId('customer_id','customers','user_id',$userId);

        $sql = "INSERT INTO `accounts` (`customer_id`) VALUES (?)";
        $param = array($customerId);
        $this->insert($sql, $param);
        # End

        return TRUE;
    }

    # Method simple get id from table using condition
    protected function getId($id,$table,$condition,$value) {

        $sql = "SELECT $id FROM $table WHERE $condition = ?";
        $param = array($value);
        $row = $this->select($sql, $param);

        return $row[$id];
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
                    AND (user_sessions.login_time >= (NOW() - INTERVAL 3 MINUTE)) 
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

}

?>
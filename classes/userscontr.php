<?php

class UsersContr extends Users {

    public function adminCheck() {
        
        return $this->isAdmin() ? TRUE : FALSE; 
    }
    
    public function userRegister($rgData) {
        
        return $this->createUser($rgData) ? TRUE : FALSE;
    }
    
    public function autoLogin() {

        return $this->sessionLogin() ? TRUE : FALSE;
    }
   
    public function userLogin($lgData) {
        
        return  $this->manualLogin($lgData) ? TRUE : FALSE;
    }

    public function userLogout() {
        
        $this->logout();
    }
    
    # Register.php using this method
    public function findUser($userName) {

        return $this->getUser('user_name',$userName) ? TRUE : FALSE;
    }

    public function setUserAuth($userId) {

        $this->switchUserAuth($userId);
    }

    public function getUserData() {

        return $this->getUserDataBySession();
    }

    # This method will get bug if the statement really unlucky ,
    # when create the statement in time but make diffenent SECOND   
    public function getStatement() {

        $timeStamp = $this->getStatementTimeList();
        if (empty($timeStamp)) {
            return FALSE;
        }

        foreach ($timeStamp as $key => $time) {
       
            $row = $this->getUserStatement($time['statement_time']) ;
            $result[$time['statement_time']] = $row;
          
        }
        return $result;
    }
}

?>
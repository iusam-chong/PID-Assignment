<?php

class UsersContr extends Users {
    
    public function userRegister($rgData) {
        if($this->createUser($rgData)) {
            return TRUE ;
        } else {
            return FALSE ;
        }
    }

    public function autoLogin() {
        if ($this->sessionLogin()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function userLogin($lgData) {
        if ($this->manualLogin($lgData)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function userLogout() {
        $this->logout();
    }

    public function findUser($userName) {
        if ($this->getUser($userName)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
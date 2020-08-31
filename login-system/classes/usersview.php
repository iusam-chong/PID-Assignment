<?php

class UsersView extends Users {

    public function showUser() {
        $result = $this->getUser();
        echo "Full name: " . $result['user_name'];
    }

    public function loginPage($lgData) {
        $this->title = "登入";

        $this->tempUserName = "";
        $this->tips = "";

        if (isset($lgData->userName)) {
            $this->tempUserName = $lgData->userName;
        }
        if (isset($lgData->message)) {
            $this->tips = $lgData->message;
        }
        
        require_once('./views/login.page.php');
    }

    public function registerPage($rgData) {
        
        # Contruct register page showing value 
        $this->title = "註冊";
        $this->tips = "";

        $this->tempUserName      = $rgData->userName;
        $this->userPasswd        = $rgData->userPasswd;
        $this->userPasswdConfrim = $rgData->userPasswdConfrim;
        $this->customerName      = $rgData->customerName;
        $this->customerIdCard    = $rgData->customerIdCard;
        $this->customerEmail     = $rgData->customerEmail;
        $this->customerPhoneNum  = $rgData->customerPhoneNum;
        # Contruct END

        if (isset($rgData->message)) {
            $this->tips = $rgData->message;
        }

        require_once('./views/register.page.php');
    }

    public function mainPage() {
        $this->title = "首頁";
        require_once('./views/main.page.php');
    }
}

?>
<?php

class UsersView extends Users {

    // public function showUser() {
    //     $result = $this->getUser();
    //     echo "Full name: " . $result['user_name'];
    // }

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

        $this->tempUserName = "";
        if(isset($rgData->userName)){
            $this->tempUserName = $rgData->userName;
        }
       
        # Contruct END

        if (isset($rgData->message)) {
            $this->tips = $rgData->message;
        }

        require_once('./views/register.page.php');
    }

    public function adminMainPage() {
        $this->title = "管理者首頁";
        
        require_once('./views/adminmain.page.php');
    }

    public function memberListPage() {
        $this->title = "會員清單";

        $result = $this->getAllUser();
        
        require_once('./views/adminmemberlist.page.php');
    }

    public function userMainPage($prodData,$userData,$cartUnit) {
        $this->title = "首頁";

        require_once('./views/usermain.page.php');
    }

    public function cartPage($userData,$cartUnit,$cartList) {
        $this->title = "購物車";

        require_once('./views/cart.page.php');
    }

}

?>
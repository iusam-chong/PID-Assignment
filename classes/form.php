<?php

class Form {
    // public $userName;
    // public $userPasswd;
    // public $userPasswdConfrim;

    // public $message;

    public function registerForm($userName,$userPasswd,$userPasswdConfrim) {
        $this->userName = $userName;
        $this->userPasswd = $userPasswd;
        $this->userPasswdConfrim = $userPasswdConfrim;
    }

    public function loginForm($userName,$userPasswd) {
        $this->userName = $userName;
        $this->userPasswd = $userPasswd;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function checkFormat($string) {
        
        # This should be more logic for checking input format
        # but now we just simplify the project
        # check character classes from https://regexr.com

        # Check password match or not 
        if (isset($string->userPasswd)) {
            
            if ($string->userPasswd !== $string->userPasswdConfrim) {
                $this->message = "密碼不一致";
                return FALSE;
            }
        }

         # Check Email format
        if (isset($string->customerEmail)) {
            if (!filter_var($string->customerEmail, FILTER_VALIDATE_EMAIL)) {
                $this->message = "EMAIL格式錯誤";
                return FALSE;
            }
        }

        return TRUE;
    }

    public function setProduct($prodName,$prodPrice,$prodUnit,$prodDesc) {
        $this->prodName = $prodName;
        $this->prodPrice = $prodPrice;
        $this->prodUnit = $prodUnit;
        $this->prodDesc = $prodDesc;
    }

    public function setProductImg($prodImg) {
        $this->prodImg = $prodImg;
    }

    public function setProductId($prodId) {
        $this->prodId = $prodId;
    }
}

?>
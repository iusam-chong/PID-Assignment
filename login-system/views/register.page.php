<!doctype html>
<html>
    
<?php
require_once('header.page.php');
?>
  
<body>
    <div class="container text-center">
    <div class="row h-75">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 my-auto">
            <h2>網銀註冊</h2>
            <hr>
            
            <form method="post" action="">
                <div class="form-group">
                    <label>使用者賬號</label>
                    <input maxlength="16" type="text" class="form-control" id="textUserName" name="textUserName" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->tempUserName?>">
                </div>

                <div class="form-group">
                    <label>網銀密碼</label>
                    <input maxlength="16" type="password" class="form-control" id="textPassword" name="textPassword" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->userPasswd?>">
                </div>

                <div class="form-group">
                    <label>網銀密碼確認</label>
                    <input maxlength="16" type="password" class="form-control" id="textConfirmPassword" name="textPasswordComfird" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->userPasswdConfrim?>">
                </div>
                
                <div class="form-group">
                    <label>姓名</label>
                    <input maxlength="20" type="text" class="form-control" name="textName" id="textName" required="required" value="<?=$this->customerName?>">
                </div>

                <div class="form-group">
                    <label>身份證</label>
                    <input maxlength="20" type="text" class="form-control" id="textIdCard" name="textIdCard" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->customerIdCard?>">
                </div>

                <div class="form-group">
                    <label>手機號碼</label>
                    <input maxlength="16" type="text" class="form-control" id="textPhoneNum" name="textPhoneNumber" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->customerPhoneNum?>">
                </div>

                <div class="form-group">
                    <label>EMAIL</label>
                    <input maxlength="50" type="text" class="form-control" name="textEmail" required="required" id="textEmail" value="<?=$this->customerEmail?>">
                </div>
                <div class="form-group">
                    <small class="form-text text-muted"><?=$this->tips?></small>
                </div>
                <button type="submit" class="btn btn-primary" name="register" value="1">送出</button>
            </form>
            
            <hr>
            <a href="login">前往登入</a>    
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>
</body>
</html>
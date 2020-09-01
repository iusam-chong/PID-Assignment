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
            <h2>奇妙網購註冊</h2>
            <hr>
            
            <form method="post" action="">
                <div class="form-group">
                    <label>賬號</label>
                    <input maxlength="16" type="text" class="form-control" id="textUserName" name="textUserName" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->tempUserName?>">
                </div>

                <div class="form-group">
                    <label>密碼</label>
                    <input maxlength="16" type="password" class="form-control" id="textPassword" name="textPassword" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->userPasswd?>">
                </div>

                <div class="form-group">
                    <label>密碼確認</label>
                    <input maxlength="16" type="password" class="form-control" id="textConfirmPassword" name="textPasswordComfird" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->userPasswdConfrim?>">
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
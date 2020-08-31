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
            <h2>網銀登入</h2>
            <hr>
            
            <form method="post" action="">
                <div class="form-group">
                    <label>使用者賬號</label>
                    <input maxlength="16" type="text" class="form-control" id="textUserName" name="textUserName" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->tempUserName ?>">
                </div>
                <div class="form-group">
                    <label>網銀密碼</label>
                    <input maxlength="16" type="password" class="form-control" id="textPassword" name="textPassword" required="required" pattern="[a-zA-Z0-9]{8,}">
                </div>
                <p class="form-text text-muted"><?=$this->tips?></p>
                <button type="submit" class="btn btn-primary" value="1">登入</button>
            </form>
            <hr>
            <a href="register">註冊賬號</a>
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>
</body>
</html>
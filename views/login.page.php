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
            <h2>奇妙網購登入</h2>
            <hr>
            
            <form method="post" action="">
                <div class="form-group">
                    <label>賬號</label>
                    <input maxlength="16" type="text" class="form-control" id="textUserName" name="textUserName" required="required" pattern="[a-zA-Z0-9]{8,}" value="<?=$this->tempUserName ?>">
                </div>
                <div class="form-group">
                    <label>密碼</label>
                    <input maxlength="16" type="password" class="form-control" id="textPassword" name="textPassword" required="required" pattern="[a-zA-Z0-9]{8,}">
                </div>
                <p class="form-text text-muted"><?=$this->tips?></p>
                <button type="submit" class="btn btn-primary" value="1">奇妙登入</button>
            </form>
            <hr>
            
            <div class="row">
                <div class="col-6">
                    <a class="float-right" href="register">註冊賬號</a>
                </div>
                <div class="col-6">
                    <a class="float-left" href="main">前往首頁</a>
                </div>
            </div>
             
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>
</body>
</html>
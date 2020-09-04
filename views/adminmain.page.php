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
            <h2>奇妙網購 - 管理端頁面</h2>
            <hr>
                
            <div class="row">

                <div class="col-3">
                    <a class="btn btn-info btn-lg btn-block btn-huge" style="display: flex; justify-content: center;" href="adminstatementlist">訂單管理</a>
                </div>

                <div class="col-3">
                    <a class="btn btn-info btn-lg btn-block btn-huge" style="display: flex; justify-content: center;" href="memberlist">會員列表</a>
                </div>

                <div class="col-3">
                    <a class="btn btn-info btn-lg btn-block btn-huge" style="display: flex; justify-content: center;" href="productmanage">商品管理</a>
                </div>

                <div class="col-3">
                    <a class="btn btn-info btn-lg btn-block btn-huge" style="display: flex; justify-content: center;" href="">查看報表</a>
                </div>
            
            </div>

            <hr>
            <a href="logout" class="btn btn-danger">登出</a>
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
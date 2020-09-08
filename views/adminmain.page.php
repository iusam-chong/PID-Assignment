<!doctype html>
<html>
    
<?php
require_once('header.page.php');
?>

<body>

    <div class="container text-center">
    <div class="row h-75">
        <div class="col-sm-12 my-auto">
            <h2>奇妙網購 - 管理端頁面</h2>
                <div class="row">
                    <div class="col-6">
                        <a class="float-left" style="text-align:center;">歡迎回來</a>
                    </div>
                    <div class="col-6">
                        <a href="logout" class="btn btn-danger float-right">登出</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary float-left" style="margin-right:5px;">首頁</a>
                        <a href="adminstatementlist" class="btn btn-outline-primary float-left" style="margin-right:5px;">訂單管理</a>
                        <a href="memberlist" class="btn btn-outline-primary float-left" style="margin-right:5px;">會員清單</a>
                        <a href="productmanage" class="btn btn-outline-primary float-left" style="margin-right:5px;">商品管理</a>
                        <a href="adminchart" class="btn btn-outline-primary float-left" style="margin-right:5px;">查看報表</a>
                    </div>
                    
                </div>

            
            
            
            
            
            <hr>
            <!--<hr>
            <a href="logout" class="btn btn-danger">登出</a>
            -->
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
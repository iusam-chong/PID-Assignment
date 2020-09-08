<!doctype html>
<html>
    
<?php
require_once('header.page.php');
?>

<body>

    <div class="container text-center">
    <div class="row h-75">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 my-auto">
            <h2>奇妙網購</h2>
            <hr>


            <?php
                @$cartItemQuantity = $cartUnit;
                @$userName = $userData['user_name'];
                $headerLogin = <<<loggedIn
                <div class="row">
                    <div class="col-6">
                        <a class="float-left" style="text-align:center;">歡迎回來<b> $userName</b></a>
                    </div>
                    <div class="col-6">
                        <a href="logout" class="btn btn-danger float-right">登出</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary float-left" style="margin-right:5px;">首頁</a>
                        <a href="statement" class="btn btn-outline-primary float-left" style="margin-right:5px;">購買明細</a>
                        <a href="cart" class="btn btn-outline-primary float-left">我的購物車($cartItemQuantity)</a>
                    </div>
                    
                </div>
                loggedIn;

                $headerNotLogin = <<<notLogin
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <a href="#" class="btn btn-primary float-left" style="margin-right:5px;">首頁</a>
                        <a href="cart" class="btn btn-outline-primary float-left">我的購物車($cartItemQuantity)</a>
                        
                    </div>
                    <div class="col-6">
                        <a href="register" class="btn btn-outline-primary float-right" style="margin-left:5px;">註冊帳號</a>
                        <a href="login" class="btn btn-outline-primary float-right">前往登入</a>
                    </div>
                </div>
                notLogin;

                if(isset($userData)){
                    echo $headerLogin . "<hr>";
                } else {
                    echo $headerNotLogin . "<hr>";
                }
            ?>
            
            <div class="row">


                <form id="addtocart" method="post" action=""></form>

                <?php foreach($prodData as $d) { ?>
                <div class="card col-3">
                    <img class="card-img-top" src="<?='./uploads/'.$d['product_image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$d['product_name']?></h5>
                        <table class="table">
                            <tr><td>價格:</td><td><?=$d['unit_price'] ?></td></tr>
                            <tr><td>庫存:</td><td><?=$d['unit_in_stock'] ?></td></tr>
                            <tr><td>描述:</td><td><?=$d['product_desc'] ?></td></tr>
                        </table>

                        <div>
                            <button class="btn btn-info" type="submit" form="addtocart" name="clickAddToCart" value="<?=$d['product_id']?>">加入購物車</button>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>


            <hr>

        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
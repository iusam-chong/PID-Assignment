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
            <h2>購物車</h2>
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
                        <a href="main" class="btn btn-outline-primary float-left" style="margin-right:5px;">回到首頁</a>
                        <a href="#" class="btn btn-outline-primary float-left" style="margin-right:5px;">購買明細</a>
                        <a href="#" class="btn btn-primary float-left">我的購物車($cartItemQuantity)</a>
                    </div>
                    
                </div>
                loggedIn;

                $headerNotLogin = <<<notLogin
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <a href="main" class="btn btn-outline-primary float-left" style="margin-right:5px;">回到首頁</a>
                        <a href="#" class="btn btn-primary float-left">我的購物車($cartItemQuantity)</a>
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
                    <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" colspan="2">產品</th>
                                <th scope="col">價格</th>
                                <th scope="col">數量</th>
                                <th scope="col">小計</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <form id="form" method="post" action=""></form>

                            <?php foreach ($cartList as $list) { ?>
                            <tr>
                                <td><img style="width:100px;" class="card-img-top" src="<?='./uploads/'.$list['product_image'] ?>"></td>
                                <td style="vertical-align: middle; text-align: left;"><?= $list['product_name']?></td>
                                <td style="vertical-align: middle"><?= $list['unit_price']?></td>
                                <td style="vertical-align: middle;">
                                    <select class="form-control " name="quantity" style="width:70%; margin-left:30px;">
                                    <?php for($i = 1 ; $i <= $list[unit_in_stock] ; $i++) { ?>
                                        <option value="<?= $i?>" <?php if ($i == $list['quantity'])echo "selected";?>><?=$i?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </td>
                                <td style="vertical-align: middle"><?= $list['unit_price'] * $list['quantity'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
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
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
            <h2>購買明細</h2>
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
                        <a href="main" class="btn btn-outline-primary float-left" style="margin-right:5px;">首頁</a>
                        <a href="#" class="btn btn-primary float-left" style="margin-right:5px;">購買明細</a>
                        <a href="cart" class="btn btn-outline-primary float-left">我的購物車($cartItemQuantity)</a>
                    </div>
                    
                </div>
                loggedIn;
                echo $headerLogin . "<hr>";
            ?>
            
            <div class="row">
                <div class="col-12">

                    <?php 
                    if (empty($statement)) { echo " <p>查無資料</p>"; }
                    else {
                        foreach ($statement as $s) {
                            echo "<p class='float-left'>".key($statement)."</p>";
                            $tableHeadet = <<<header
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" colspan="2">產品</th>
                                        <th scope="col">價格</th>
                                        <th scope="col">數量</th>
                                        <th scope="col">小計</th>
                                    </tr>
                                </thead>
                                <tbody>
                            header; echo $tableHeadet;
                            $total = 0 ;
                            foreach ($s as $data) {
                                echo '<tr><td><img style="width:100px;" class="card-img-top" src=./uploads/'.$data['product_image'].'></td>';
                                echo '<td style="vertical-align: middle; text-align: left;">'.$data['product_name'].'</td>';
                                echo '<td style="vertical-align: middle">'.$data['unit_price'].'</td>';
                                echo '<td style="vertical-align: middle">'.$data['product_quantity'].'</td>';
                                echo '<td style="vertical-align: middle">'.$data['product_quantity']*$data['unit_price'].'</td></tr>';
                                $total += ($data['product_quantity']*$data['unit_price']);
                            }
                            echo '<tr><td colspan="5" style="vertical-align: middle; text-align: right;">共計：'.$total.'</td></tr></tbody></table>';
                        }
                    } ?>
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
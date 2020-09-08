<!doctype html>
<html>
    
<?php
require_once('header.page.php');
?>

<body>

    <div class="container text-center">
    <div class="row h-75">
        <div class="col-sm-12 my-auto">
            <h2>查看報表</h2>
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
                        <a href="adminstatementlist" class="btn btn-outline-primary float-left" style="margin-right:5px;">訂單管理</a>
                        <a href="memberlist" class="btn btn-outline-primary float-left" style="margin-right:5px;">會員清單</a>
                        <a href="productmanage" class="btn btn-outline-primary float-left" style="margin-right:5px;">商品管理</a>
                        <a href="#" class="btn btn-primary float-left" style="margin-right:5px;">查看報表</a>
                    </div>
                    
                </div>
            <hr>

            <div class="row float-center" style="padding-bottom:15px;">
                <div class="col-12">
                    <form method="POST">
                        <button type="submit" class="btn <?php echo (isset($btnFlag->day)) ? ' btn-info' : 'btn-outline-info'; ?>" name="day" value="1">今日銷量</button>
                        <button type="submit" class="btn <?php echo (isset($btnFlag->week)) ? ' btn-info' : 'btn-outline-info'; ?>" name="week" value="1">產品週銷量</button>
                    </form>
                </div>
            </div>
            
            <div class="row float-center">
                <div class="col-12">
                    <table class="table table-striped"> 
                        <thead>
                        <tr>
                            <th>產品名稱</th>
                            <th>單價</th>
                            <th>銷售量</th>
                            <th>小計</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total = 0 ;
                                foreach($data as $d) {
                                echo   '<tr>
                                        <td>'.$d["product_name"].'</td>
                                        <td>'.$d["unit_price"].'</td>
                                        <td>'.$d["total_quantity"].'</td>
                                        <td>'.$d["total_price"].'</td>
                                        </tr>';
                                $total += $d["total_price"]; }
                                echo   '<tr>
                                        <td colspan=2></td>
                                        <td class="float-right">共計:</td>
                                        <td>'.$total.'</td></tr>';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
                
            

            <hr>
            <!--
            <a href="main" class="btn btn-danger">返回首頁</a>
            -->
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
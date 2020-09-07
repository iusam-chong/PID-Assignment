<!doctype html>
<html>
    
<?php
require_once('header.page.php');
?>

<body>

    <div class="container text-center">
    <div class="row h-75">
        <div class="col-sm-12 my-auto">
            <h2>訂單管理</h2>
            <hr>
                
            <div class="row">
                <div class="col-12">

                    <?php 
                    if (empty($data)) { echo " <p>查無資料</p>"; }
                    else {
                        $tempId = NULL;
                        $tempTime = NULL;
                        foreach ($data as $d) {
                            if($tempId != $d->user_id || $tempTime != $d->statement_time) {
                                if ($tempId != NULL && $tempTime != NULL){
                                    echo '<tr><td colspan="5" style="vertical-align: middle; text-align: right;">共計：'.$total.'</td></tr>';
                                    echo '</tbody></table><br>';
                                }


                                //echo "<p class='float-left'>訂單時間：".." | 用戶名稱：".$d->user_name."</p>";
                                $tableHeadet = <<<header
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" colspan="2">訂單時間：$d->statement_time</th>
                                            <th scope="col" colspan="3">用戶名稱：$d->user_name</th>
                                        </tr>
                                        <tr>
                                            <!--<th scope="col" colspan="2">產品</th>-->
                                            <th scope="col">產品</th>
                                            <th scope="col">價格</th>
                                            <th scope="col">數量</th>
                                            <th scope="col">小計</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                header; echo $tableHeadet;
                                $tempId = $d->user_id;
                                $tempTime = $d->statement_time;
                                $total = 0 ;
                            }
                            
                            foreach ($d->data as $list) {
                                //echo '<tr><td><img style="width:100px;" class="card-img-top" src=./uploads/'.$list->product_image.'></td>';
                                echo '<td style="vertical-align: middle; text-align: left;">'.$list->product_name.'</td>';
                                echo '<td style="vertical-align: middle">'.$list->unit_price.'</td>';
                                echo '<td style="vertical-align: middle">'.$list->product_quantity.'</td>';
                                echo '<td style="vertical-align: middle">'.$list->product_quantity*$list->unit_price.'</td></tr>';
                                $total += ($list->product_quantity*$list->unit_price);
                            }
                            
                        }
                        echo '<tr><td colspan="5" style="vertical-align: middle; text-align: right;">共計：'.$total.'</td></tr>';
                        echo '</tbody></table><br>';
                    } ?>
                </div>
            </div>

            <hr>
            <a href="main" class="btn btn-danger">返回首頁</a>
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
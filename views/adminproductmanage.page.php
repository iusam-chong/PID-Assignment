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
            <h2>商品管理 - 產品列表</h2>
            <hr>
            <form id="form" method="post" action=""></form>
            <a href="productinsert" class="btn btn-success">新增產品</a>
            <hr>
                
            <div class="row">

                <form id="edit" method="post" action=""></form>
                <form id="delete" method="post" action=""></form>

                <?php foreach($data as $d) { ?>
                <div class="card col-6">
                    <img class="card-img-top" src="<?='./uploads/'.$d['product_image'] ?>">
                    <div class="card-body">
                        <h5 class="card-title">ID:<?=$d['product_id'] ." ". $d['product_name']?></h5>
                        <table class="table">
                            <tr><td>價格:</td><td><?=$d['unit_price'] ?></td></tr>
                            <tr><td>庫存:</td><td><?=$d['unit_in_stock'] ?></td></tr>
                            <tr><td>描述:</td><td><?=$d['product_desc'] ?></td></tr>
                        </table>
        
                        <div>
                            <button class="btn btn-primary" type="submit" form="edit" name="editProduct" value="<?=$d['product_id']?>">修改</button>
                            <button class="btn btn-danger" type="submit" form="delete" name="deleteProduct" value="<?=$d['product_id']?>">刪除</button>
                        </div>
                    </div>
                </div>
                <?php } ?>

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
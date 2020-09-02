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
            <h2>會員清單</h2>
            <hr>
                <div class="row">
                    <div class="col-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">用戶編號</th>
                                <th scope="col">用戶名稱</th>
                                <th scope="col">註冊時間</th>
                                <th scope="col">權限狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <form id="form" method="post" action=""></form>

                            <?php foreach ($result as $r) { ?>
                            <tr>

                                <td scope="row"><?= $r['user_id'] ?></td>
                                <td><?= $r['user_name'] ?></td>
                                <td><?= $r['user_reg_time'] ?></td>
                                <td>
                                    <button id="btn" class="btn btn-primary" type="submit" form="form" name="userId" value="<?=$r['user_id']?>">
                                    <?php echo ($r['user_enabled']=='1') ? "啟用中" : "停用中" ; ?>
                                    </button>
                                </td>

                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            
            <a href="main" class="btn btn-danger">返回首頁</a>
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>

</body>
</html>
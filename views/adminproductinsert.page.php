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
            <h2><?=$this->title ?></h2>
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
                        <a href="adminchart" class="btn btn-outline-primary float-left" style="margin-right:5px;">查看報表</a>
                    </div>
                    
                </div>
            <hr>
     
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>產品名稱</label>
                    <input maxlength="30" type="text" class="form-control" name="textProdName" required="required" value="<?=$this->product_name ?>"></input>
                </div>

                <div class="form-group">
                    <label>產品價格</label>
                    <input maxlength="8" type="text" class="form-control" name="textProdPrice" required="required" pattern="[0-9]{1,}" value="<?=$this->unit_price ?>"></input>
                </div>

                <div class="form-group">
                    <label>產品數量</label>
                    <input maxlength="8" type="text" class="form-control" name="textProdUnit" required="required" pattern="[0-9]{1,}" value="<?=$this->unit_in_stock ?>"></input>
                </div>

                <div class="form-group">
                    <label>產品描述</label>
                    <textarea maxlength="8" type="text" class="form-control" name="textProdDesc" required="required" rows="3" ><?=$this->product_desc ?></textarea></input>
                </div>

                <div class="form-group">
                    <label>產品圖片</label>
                    <img id="blah" src="<?='./uploads/' . $this->product_image ?>" style="widht:400px; height:400px;"/>
                    <input type="file" class="form-control" id="imgTnp" name="imgProd" ></input>
                    <input type="hidden" id="imgContr" value="<?=$this->imgContr ?>">
                    <input type="hidden" name="defaultImg" value="<?= $this->product_image?>">
                    <input type="hidden" name="textProdId" value="<?= $this->product_id?>">
                </div>

                <div class="form-group">
                    <small class="form-text text-muted"><?=$this->tips?></small>
                </div>
                <a href="productmanage" class="btn btn-danger">取消</a>
                <button type="submit" class="btn btn-primary" name="newProduct" value="1">送出</button>
            </form>
      

            <hr>
            <!--
            <a href="productmanage" class="btn btn-danger">返回商品管理</a>
            -->
        </div>
    </div>
    </div>

<?php
    require_once('script.page.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

$("#blah").hide();
if($("#imgContr").val()) {
    $("#blah").show();
}

$("#imgTnp").change(function(){
    $("#blah").show();
    readURL(this);
});

function readURL(input){

if(input.files && input.files[0]){

  var reader = new FileReader();

  reader.onload = function (e) {

     $("#blah").attr('src', e.target.result);

  }

  reader.readAsDataURL(input.files[0]);

}

}

</script>
</body>
</html>
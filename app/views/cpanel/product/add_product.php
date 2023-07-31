<?php
    $msg = Session::get('msg');
    Session::unset('msg');
    if(isset($msg)){
        echo $msg;
        
    } 
?>
<h3 style="text-align:center;">Thêm danh mục sản phẩm</h3>
<div class="col-md-12">
    <form action="<?php echo BASE_URL?>product/insert_product" method="POST">
    <div class="form-group">
        <label for="category_name">Tên danh mục</label>
        <input type="text" name="title_category_product"class="form-control">
    </div>
    <div class="form-group">
        <label for="category_desc">Miêu tả danh mục</label>
        <input type="text" name="desc_category_product" class="form-control">
    </div>

    <button type="submit" class="btn btn-default">Thêm danh mục</button>
    </form>
</div>
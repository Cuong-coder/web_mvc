<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>login/dashboard">Blog cua C</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo BASE_URL ?>login/dashboard">Trang Chủ</a></li>
            <li><a href="#">Thông tin website</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo BASE_URL ?>post">Danh Mục Bài Viết
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo BASE_URL ?>post/add_post">Thêm</a></li>
                <li><a href="<?php echo BASE_URL ?>post/post_detail">Liệt kê</a></li>
                </ul>                       
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh Mục Sản phẩm
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo BASE_URL ?>product/add_product">Thêm</a></li>
                <li><a href="<?php echo BASE_URL ?>product/product_detail">Liệt kê</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn Hàng
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo BASE_URL ?>order/add_order">Thêm</a></li>
                <li><a href="<?php echo BASE_URL ?>order/order">Liệt kê</a></li>
                </ul>
            </li>

            </ul>
        </div>
    </nav>
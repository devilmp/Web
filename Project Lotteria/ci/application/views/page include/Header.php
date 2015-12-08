<header>
    <div class="menu_top">
        <div class="logo">
            <a href="<?php echo base_url();?>index.php/Lotteria"><div class="home"></div></a>
        </div>
        <div class="sub_page" id="menu_top"><a href="#1">Thực Đơn</a></div>
        <div class="sub_page" id="order"><a href="<?php echo base_url();?>index.php/ShoppingCartController/viewCart">Đặt Hàng</a></div>
        <div class="sub_page" id="promotion"><a href="<?php echo base_url();?>index.php/Lotteria/Promotion">Khuyến Mãi</a></div>
        <div class="logo_Lotteria">
            <a href="<?php echo base_url();?>index.php/Lotteria"><img src="<?php echo base_url();?>assets/image/Top/logo.png"></a>
        </div>
        <div class="sub_page" id="restaurant"><a href="#4">Cửa Hàng</a></div>
        <div class="sub_page" id="member"><a href="<?php echo base_url();?>index.php/Lotteria/Member">Thành Viên</a></div>
        <div id="search_icon"><div class="image" id="search"><a href="#search"></a></div></div>
        <div id="quantity">
            <div class="image" id="shopping_cart">
                <?php $count = 0;
                    if(isset($_SESSION)&&isset($_SESSION['shoppingcart'])){
                        foreach ($_SESSION['shoppingcart'] as $item) {
                            $count += $item;
                        }
                    }
                ?>
                <a href="<?php echo base_url();?>index.php/ShoppingCartController/viewCart"><?php echo $count; ?></a> 
            </div>
        </div>
        <div id="language"><a href="#6">EN</a></div>
        
    </div>
    <div class="food_menu">
        <div class="kind_of_meal" id="hamburger">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Hamburger">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">HAMBURGER</div>
            </a>
        </div>
        <div class="kind_of_meal" id="dessert">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Dessert">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">TRÁNG MIỆNG</div>
            </a>
        </div>
        <div class="kind_of_meal" id="rice">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Rice">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">CƠM</div>
            </a>
        </div>
        <div class="kind_of_meal" id="combo">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Combo">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">COMBO</div>
            </a>
        </div>
        <div class="kind_of_meal" id="value">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Value">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">VALUE</div>
            </a>
        </div>
        <div class="kind_of_meal" id="chicken">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Chicken">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">GÀ</div>
            </a>
        </div>
        <div class="kind_of_meal" id="drink">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Drink">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">NƯỚC UỐNG</div>
            </a>
        </div>
        <div class="kind_of_meal" id="happymenu">
            <a href="<?php echo base_url();?>index.php/Lotteria/Menu/Happy">
                <div class="meal_image"></div>
                <div class="meal_image_shadow"></div>
                <div class="meal_name">HAPPY MENU</div>
            </a>
        </div>
    </div>
    <div class="search_area">
        <form class="search" action="<?php echo base_url();?>index.php/MealsController/search" method="post">
            <div class="search_input">
                <div class="search_title">TÌM KIẾM.</div>
                <div class="input_infor">
                    <input type="text" class="text" name="information">
                    <div class="search_close"></div>
                    <input type="submit" class="confirm" value="">
                </div>
            </div>
            <div class="option">
                <div id="search_meal">
                    <input type="radio" id="meal" class="radio" name="search_option" value="Sản phẩm" checked="checked">
                    <label for="meal">Sản phẩm</label>
                </div>
                <div id="search_meal">
                    <input type="radio" id="meal" class="radio" name="search_option" value="Tin tức">
                    <label for="news">Tin tức</label>
                </div>
            </div>
        </form>
    </div>
</header>
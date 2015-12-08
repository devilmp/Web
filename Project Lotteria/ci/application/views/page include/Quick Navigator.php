<div class="quick_nav">
    <a href="<?php echo base_url();?>index.php/ShoppingCartController/viewCart">
        <div class="nav" id="order">
            <div class="img"></div>
                <?php $count = 0;
                    if(isset($_SESSION)&&isset($_SESSION['shoppingcart'])){
                        foreach ($_SESSION['shoppingcart'] as $item) {
                            $count += $item;
                        }
                    }
                ?>
            <div id="num_of_items"><?php echo $count; ?></div>
        </div>
    </a>
    <a href="#">
        <div class="nav" id="promotion">
            <div class="img"></div>
        </div>
    </a>
</div>
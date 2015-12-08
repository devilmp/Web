<?php include'Login.php';?>
<footer id="home_footer">
    <div class="copyrighter">
        <div class="owner">&copy; 2015 Lotteria All Rights Reserved</div>
        <div class="author"><a href="author">Site by KhonNanCongKhai</a></div>
    </div>
    <div class="log_in_form">
        <?php 
         if(isset($_SESSION["username"])){

            ?>
        <div><a href="#login-box" class="log_in"><?php echo $_SESSION["username"] ?></a></div>
        <div><a href="<?php echo base_url();?>index.php/AccountController/Logout" class="sign_in">Log-out</a></div>
        <?php }
        else{
        ?>
        <div><a href="#login-box" class="log_in">Log in</a></div>
        <div><a href="<?php echo base_url();?>index.php/Lotteria/Member" class="sign_in">Sign in</a></div>
        <?php } ?>
    </div>
    <div class="references">
        <ul class="foot_menu">
            <li><a href="<?php echo base_url();?>index.php/Lotteria/Introduction">Giới thiệu</a></li>
            <li><a href="<?php echo base_url();?>index.php/Lotteria/News">Tin tức</a></li>
            <li><a href="#">Tuyển dụng</a></li>
            <li class="none_border"><a href="<?php echo base_url();?>index.php/Lotteria/Contact">Liên hệ</a></li>
        </ul>
        <div class="share">
            <a href=""><div id="bird"></div></a>
            <a href=""><div id="pi"></div></a>
            <a href=""><div id="face"></div></a>
            <a href=""><div id="google"></div></a>
            <a href=""><div id="youtube"></div></a>
        </div>
    </div>
</footer>
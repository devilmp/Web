<div class="login" id="login-box">
    <div class="log_in_title">ĐĂNG NHẬP</div>
    <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="<?php echo base_url();?>assets/image/close.png" /></a>
    <form class="login-content" action="<?php echo base_url();?>index.php/AccountController/Login" method="post">
        <label class="username">
            <span>Tên đăng nhập</span>
            <input id="username" type="text" autocomplete="on" name="txtUsername" placeholder="Username" value="" />
        </label>
        <label class="password">
            <span>Mật khẩu</span>
            <input id="password" type="password" name="txtPassword" placeholder="Password" value="" />
        </label>
        <a class="forgot" href="#">Quên mật khẩu?</a>
        <br/>
        <div class="action">
            <button class="button submit-button" type="submit" name="location" value="Home">Đăng nhập</button>
            <button class="button facebook-button" type="button">Facebook</button>
        </div>
    </form>
</div>
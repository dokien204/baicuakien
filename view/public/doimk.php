<section style="margin-top: 100px;" class="account-section bg_img">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <h2 class="title">Đổi mật khẩu</h2>
                </div>
                <form class="account-form" method="post" action="index.php?act=doimk">
                    <div class="form-group">
                        <label for="email2">Email<span>*</span></label>
                        <input type="text" name="email" value="<?= $_SESSION['khach_hang']['email'] ?>" placeholder="Enter Your Email" id="email2" required>
                    </div>
                    <div class="form-group">
                        <label for="pass3">Mật khẩu cũ<span>*</span></label>
                        <input type="password" name="pass" placeholder="Password" id="pass3">
                    </div>
                    <p style="color: red;"><?= $err1 ?? "" ?></p>
                    <p style="color: red;"><?= $err2 ?? "" ?></p>
                    <div class="form-group">
                        <label for="pass2">Mật khẩu mới<span>*</span></label>
                        <input type="password" name="pass_new" placeholder="Password mới" id="pass2">
                    </div>
                    <p style="color: red;"><?= $err1 ?? "" ?></p>
                    <p style="color: green;"><?= $succ ?? "" ?></p>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal2" required checked>
                        <label for="bal2">remember password</label>
                        <a href="#0" class="forget-pass">Forget Password</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="ĐỔI">
                    </div>
                </form>
                <div class="option">
                    Don't have an account? <a href="index.php?act=sign-up">sign up now</a>
                </div>
                <div class="or"><span>Or</span></div>
                <ul class="social-icons">
                    <li>
                        <a href="#0">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
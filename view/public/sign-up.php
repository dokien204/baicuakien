<section class="account-section bg_img" data-background="assets/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">welcome</span>
                    <h2 class="title">to RushCine </h2>
                </div>

                <form class="account-form" action="index.php?act=sign-up" method="post">
                    <div class="form-group">
                        <label for="email1">Email</label>
                        <input type="text" name="email" placeholder="Enter Your Email" id="email1">
                    </div>
                    <span style="color: red;" class="error"><?php echo isset($emailErr) ? $emailErr : ''; ?> </span>
                    <div class="form-group">
                        <label for="pass1">Password</label>
                        <input type="password" name="pass" placeholder="Password" id="pass1">
                    </div>
                    <span style="color: red;" class="error"><?php echo isset($passwordErr) ? $passwordErr : ''; ?></span>
                    <div class="form-group">
                        <label for="pass2">Confirm Password</label>
                        <input type="password" name="confirm-pass" placeholder="Password" id="pass2">
                    </div>
                    <span style="color: red;" class="error"><?php echo isset($rpassErr) ? $rpassErr : ''; ?></span>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal" checked>
                        <label for="bal">I agree to the <a href="#0">Terms, Privacy Policy</a> and <a href="#0">Fees</a></label>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Sign-Up">
                    </div>
                    <span class="error"><?php echo isset($loginErr) ? $loginErr : ''; ?></span>
                </form>
                <div class="option">
                    Already have an account? <a href="index.php?act=sign-in">Login</a>
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
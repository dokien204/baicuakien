<section style="margin-top: 100px;" class="account-section bg_img">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">hello</span>
                    <h2 class="title">welcome back</h2>
                </div>
                <form class="account-form" method="post" action="index.php?act=sign-in">
                    <div class="form-group">
                        <label for="email2">Email</label>
                        <input type="text" name="email" placeholder="Enter Your Email" id="email2">
                    </div>
                    <span style="color: red;" class="error"><?php echo isset($emailErr) ? $emailErr : ''; ?></span>
                    <div class="form-group">
                        <label for="pass3">Password</label>
                        <input type="password" name="pass" placeholder="Password" id="pass3">
                    </div>
                    <span style="color: red;" class="error"><?php echo isset($passwordErr) ? $passwordErr : ''; ?></span>
                    <div class="form-group checkgroup">
                        <input type="checkbox" id="bal2" required checked>
                        <label for="bal2">remember password</label>
                        <a href="index.php?act=quenmk" class="forget-pass">Forget Password</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="log-in">
                    </div>
                    <span style="color: red; margin-left: 80px;" class="error"><?php echo isset($loginErr) ? $loginErr : ''; ?></span>
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
<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Login</h4>
                    <form autocomplete="off" action="<?php echo BASE_URL ?>homepage/check_login" method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="fw">Password
                                <a href="forgot.html" class="pull-right">Forgot Password?</a>
                            </label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" type="submit" name="check_login"
                                id="submit-insert" onclick='Javascript:checkEmail();'>Login</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Don't have an account?</span> <a href="register.html">Create
                                one</a>
                        </div>
                        <div class="title-line">
                            or
                        </div>
                        <a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login
                            with Facebook</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('App/View/Home/Layouts/footer.php'); ?>
<script language="javascript">
function checkEmail() {

    var email = document.getElementById('txtEmail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        alert('Please provide a valid email address');
        email.focus;
        return false;
    }
}
</script>
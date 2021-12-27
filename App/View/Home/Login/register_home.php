<section class="login first grey">


    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Register</h4>
                    <form name="myForm" action="<?php echo BASE_URL ?>homepage/add_register"
                        enctype="multipart/form-data" onsubmit="return validateform()" method="POST">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" pattern="[a-zA-Z]+" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type=" email" name="email" class="form-control" required>
                        </div>
                        <div class=" form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="role_id">
                            <input type="hidden" name="type">
                        </div>
                        <div class="form-group">
                            <label class="fw">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="fw">Avatar</label>
                            <input type="file" name="avatar" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label class="fw">Phone</label>
                            <input type="text" name="phone" pattern="(\+84|0)\d{9,10}"
                                title="Nhập số điện thoại từ 10 đến 11 số" class="form-control" required>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="add_register"
                                type="submit">Register</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Already have an account?</span> <a href="login.html">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('App/View/Home/Layouts/footer.php'); ?>
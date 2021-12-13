<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="Public/Admin-ate/login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(Public/Admin-ate/login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login #10</h2>
                </div>
            </div>
            <form action="" method="post" role="form" enctype="multipart/form">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Have an account?</h3>
                            <form action="#" class="signin-form">
                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" id="password" name="password" type="password"
                                        class="form-control" placeholder="Password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="action" value="submit"
                                        class="form-control btn btn-primary submit px-3" id="submit-insert">Sign
                                        In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                            <div class="social d-flex text-center">
                                <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                        class="ion-logo-facebook mr-2"></span>
                                    Facebook</a>
                                <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                        class="ion-logo-twitter mr-2"></span>
                                    Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <script type="text/javascript">
    $('#submit-insert').on('click', function() {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email == '' || password == '') {
            alert('Please enter a email or password ');
        }
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Public/Admin-ate/login/js/jquery.min.js"></script>
    <script src="Public/Admin-ate/login/js/popper.js"></script>
    <script src="Public/Admin-ate/login/js/bootstrap.min.js"></script>
    <script src="Public/Admin-ate/login/js/main.js"></script>

</body>

</html>
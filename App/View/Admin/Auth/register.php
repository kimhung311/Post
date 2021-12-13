<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="Public/Admin-ate/login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(Public/Admin-ate/login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">REGISTER</h2>
                </div>
            </div>
            <form action="" method="post" role="form" enctype="multipart/form">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Have an account?</h3>
                            <form action="#" class="signin-form">
                                <div class="form-group">
                                    <input type="hidden" value="1" name="role_id" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <input id="email-field" name="email" type="email" class="form-control"
                                        placeholder="Email" required>
                                    <span toggle="#email-field" class="fa fa-fw fa-eye field-icon toggle-email"></span>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" name="password" type="password" class="form-control"
                                        placeholder="Password" required>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <input id="address-field" name="address" type="address" class="form-control"
                                        placeholder="Address" required>
                                    <span toggle="#address-field"
                                        class="fa fa-fw fa-eye field-icon toggle-address"></span>
                                </div>
                                <div class="form-group">
                                    <input id="phone-field" name="phone" type="phone" class="form-control"
                                        placeholder="phone" required>
                                    <span toggle="#phone-field" class="fa fa-fw fa-eye field-icon toggle-phone"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" name="type" id=" exampleFormControlSelect1">
                                        <option>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="file-field" name="file" type="file" class="form-control"
                                        placeholder="file" required>
                                    <span toggle="#file-field" class="fa fa-fw fa-eye field-icon toggle-file"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="action" value="add"
                                        class="form-control btn btn-primary submit px-3">Sign
                                        Up</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <script src="Public/Admin-ate/login/js/jquery.min.js"></script>
    <script src="Public/Admin-ate/login/js/popper.js"></script>
    <script src="Public/Admin-ate/login/js/bootstrap.min.js"></script>
    <script src="Public/Admin-ate/login/js/main.js"></script>

</body>

</html>
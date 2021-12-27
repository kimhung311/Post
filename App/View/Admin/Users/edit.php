<div class="main-panel ">

    <?php
    if (!empty($_GET['msg'])) {
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo '<span class="btn btn-warning">' . $value . '</span>';
        }
    }
    ?>
    <?php
    // var_dump($userbyid);
    // die();
    foreach ($userbyid as $user) : ?>

    <form class="row g-3 needs-validation" novalidate
        action="<?php echo BASE_URL ?>admin/update_user/<?php echo $user['id'] ?>" method="POST" role="form"
        enctype="multipart/form-data" style="width:1200px;margin:auto;">
        <div class="form-group">
            <h1 class="text-center"> Register Account
            </h1>
        </div>
        <div class="form-row">
            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Name</label>
                <input type="text" name="name" id="validationCustom03" value="<?php echo $user['name'] ?>"
                    class="form-control" placeholder=" Enter Name">
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Email</label>
                <input type="email" name="email" id="validationCustom03" value="<?php echo $user['email'] ?>"
                    class="form-control" placeholder="Enter Title Email">
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Password</label>
                <input type="text" name="password" id="validationCustom03" value="<?php echo $user['password'] ?>"
                    class="form-control" placeholder="Enter  password">
            </div>


            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Delegation of Powers</label>
                <div class="input-group">
                    <select class="custom-select" id="validationCustom03" name="role_id">
                        <option selected>Choose Right</option>
                        <option value="1">Admin</option>
                        <option value="2">Editor</option>
                        <option value="3">User</option>
                    </select>
                </div>
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Account</label>
                <div class="input-group">
                    <select class="custom-select" id="validationCustom03" name="type">
                        <option selected>Choose Right</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Address</label>
                <input type="type" name="address" id="validationCustom03" value="<?php echo $user['address'] ?>"
                    class="form-control" placeholder="Enter address post">
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Avatar</label>
                <input type="file" name="avatar" id="validationCustom03" value="" class="form-control"
                    placeholder="Enter  avatar">

            </div>
            <div class="form-outline col-md-4 mb-3">
                <img src=" Public/User-image/<?php echo $user['avatar'] ?> " width=" 200" height="150"
                    alt="<?php echo $user['avatar'] ?>">
            </div>
            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">phone</label>
                <input type="number" name="phone" id="validationCustom03" value="<?php echo $user['phone'] ?>"
                    class="form-control" placeholder="Enter phone post">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="update_user">Block level
                button</button>
        </div>
    </form>
    <?php endforeach; ?>
</div>
</div>
</div>
<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
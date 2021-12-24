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

        foreach ($userbyid as $user) : ?>




    <form class="row g-3 needs-validation" novalidate
        action="<?php echo BASE_URL ?>login/update_change_password/<?php echo $user['id'] ?>" method="POST" role="form"
        enctype="multipart/form-data" style="width:1200px;margin:auto;">
        <div class="form-group">
            <h1 class="text-center"> Change Password </h1>
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
                <label for="">Current Password</label>
                <input class="form-control" type="password" name="current_password" id="currentPassword" placeholder=""
                    required>
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="">New Password</label>
                <input class="form-control" type="password" name="password" id="newPassword" placeholder="" required>
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="cf_password" id="cfPassword" placeholder="" required>
                <span id="errors"></span>
            </div>

            <input type="hidden" name="role_id" id="validationCustom03" value="<?php echo $user['role_id'] ?>">



            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Account</label>
                <div class="input-group">
                    <select class="custom-select" id="validationCustom03" name="type">
                        <!-- <option selected>Choose Right</option> -->
                        <option selected value="admin">Admin</option>
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

<script>
$(function() {
    $('#newPassword, #cfPassword').on('change keyup', function() {
        if ($('#newPassword').val() !== $('#cfPassword').val()) {
            $('#errors').text('Password không khớp');
            $('#submitChangePassword').prop('disabled', true);
        } else {
            $('#errors').text('');
            $('#submitChangePassword').prop('disabled', false);
        }
    });
});
</script>
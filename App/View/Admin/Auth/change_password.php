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

    <div class="col-md-9 mx-auto mt-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <p class="card-description"></p>
                <form class="forms-sample needs-validation" novalidate
                    action="<?php echo BASE_URL ?>login/UpdateChangePassword/<?php echo $user['id'] ?>" method="POST"
                    role="form" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputUsername2 validationCustom03"
                                name="name" value="<?php echo $user['name'] ?>" placeholder="Username" />
                            <div class="invalid-feedback">Please provide a valid Name</div>.
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" value="<?php echo $user['email'] ?>" name="email"
                                id="exampleInputUsername2 validationCustom03" placeholder="Username" />
                            <div class="invalid-feedback">Please provide a valid Email</div>.
                        </div>

                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Current Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="current_password" id="currentPassword"
                                placeholder="" required>
                            <div class="invalid-feedback">Please provide a valid Name</div>.

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" id="newPassword" placeholder=""
                                required>
                            <div class="invalid-feedback">Please provide a valid Name</div>.

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="cf_password" id="cfPassword"
                                placeholder="" required>
                            <span id="errors" style="color:red;"></span>
                            <div class="invalid-feedback">Please provide a valid Name</div>.

                        </div>
                    </div>

                    <input type="hidden" name="role_id" id="validationCustom03" value="<?php echo $user['role_id'] ?>">

                    <div class="form-group row">
                        <label for="validationCustom03" class="col-sm-3 col-form-label">Account</label>
                        <div class="input-group col-sm-9">
                            <select class="custom-select" id="validationCustom03" name="type">

                                <option selected value="<?php echo $user['type'] ?>">
                                    <?php echo $user['type'] ?></option>
                                <div class="invalid-feedback">Please provide a valid Account</div>.
                            </select>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputAddress validationCustom03"
                            class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control"
                                id="exampleInputMobile validationCustom03" value="<?php echo $user['address'] ?>"
                                placeholder=" Address" />
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="validationCustom03">Avatar</label>
                        <input type="file" name="avatar" id="validationCustom03" value="<?php echo $user['avatar'] ?>"
                            class="form-control" placeholder="Enter  avatar">
                        <div class="invalid-feedback">Please provide a valid Avatar</div>.

                    </div>

                    <div class="form-group row">
                        <img src="../../Public/User-image/<?php echo $user['avatar'] ?> " width=" 200" height="150"
                            alt="<?php echo $user['avatar'] ?>">
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputAddress validationCustom03"
                            class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="phone" name="phone" class="form-control"
                                id="exampleInputMobile validationCustom03" value="<?php echo $user['phone'] ?>"
                                placeholder=" Mobile number" />
                        </div>
                    </div>

                    <button type="submit" name="UpdateChangePassword" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>



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
<div class="main-panel ">

    <?php
    if (!empty($_GET['msg'])) {
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo '<span class="btn btn-warning">' . $value . '</span>';
        }
    }
    ?>
    <div class="col-md-10 mx-auto mt-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Add Account Admin-Editer</h4>
                <p class="card-description"></p>
                <form class="forms-sample needs-validation" novalidate action="<?php echo BASE_URL ?>Admin/AddRegister"
                    method="POST" role="form" enctype="multipart/form-data">


                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-6">
                            <input type="name" name="name" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Name" required />
                            <div class="invalid-feedback">Please provide a valid Name</div>.
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Email" required />
                            <div class="invalid-feedback">Please provide a valid Email</div>.
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Password" required />
                            <div class="invalid-feedback">Please provide a valid Password</div>.
                        </div>
                    </div>

                    <div class=" form-group row ">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Account</label>
                        <div class="input-group col-sm-6">
                            <select class="custom-select" id="validationCustom04 " name="type" required>
                                <option selected value="admin">Choose Right</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <div class="invalid-feedback">Please provide a valid Account.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="validationCustom05 validationCustom02" class="col-sm-3 col-form-label">Delegation of
                            Powers</label>
                        <div class="input-group col-sm-6">
                            <select class="custom-select" id="validationCustom03" name="role_id" required>
                                <option selected value="2">Choose Right</option>
                                <option value="1">Admin</option>
                                <option value="2">Editor</option>
                                <option value="3">User</option>
                            </select>
                            <div class="invalid-feedback">Please provide a valid Delegation of Powers.</div>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Address" required />
                            <div class="invalid-feedback">Please provide a valid Address</div>.
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Avatar</label>
                        <div class="col-sm-6">
                            <input type="file" name="avatar" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Avatar" required />
                            <div class="invalid-feedback">Please provide a valid Avatar</div>.
                        </div>
                    </div>


                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="tel" name="phone" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder=" Phone" required />
                            <div class="invalid-feedback">Please provide a valid Phone</div>.
                        </div>
                    </div>



                    <button type="submit" name="AddRegister" class="btn btn-primary mr-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>

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
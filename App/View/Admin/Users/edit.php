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
    <div class="col-md-10 mx-auto mt-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Edit Admin</h4>
                <p class="card-description"></p>
                <form class="forms-sample needs-validation" novalidate
                    action="<?php echo BASE_URL ?>Admin/updateUser/<?php echo $user['id'] ?>" method="POST" role="form"
                    enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="exampleInputUsername2 validationCustom03"
                            class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"
                                id="exampleInputUsername2 validationCustom03" placeholder="Username"
                                validation="<?php echo $user['name'] ?>" />
                            <div class="invalid-feedback">Please provide a valid Name</div>.

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2 validationCustom03" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control"
                                id="exampleInputEmail2 validationCustom03" placeholder="Email"
                                value="<?php echo $user['email'] ?>" />
                            <div class="invalid-feedback">Please provide a valid Email</div>.
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for=" validationCustom03" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id=" validationCustom03"
                                placeholder="Mobile number" value="<?php echo $user['password'] ?>" />
                            <div class="invalid-feedback">Please provide a valid Password</div>.

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="validationCustom03" class="col-sm-3 col-form-label">Delegation of Powers</label>
                        <div class="input-group col-sm-9">
                            <select class="custom-select" id="validationCustom03" name="role_id">
                                <?php $counter = 0;
                                    foreach ($user as $key => $value) :
                                        $counter++;
                                        if ($counter >= 2) {
                                            break;
                                        } ?>
                                <option selected value="<?php echo $user['role_id'] ?>"
                                    <?php $user['role_id'] == $user['role_id'] ?   'selected' : ''; ?>>
                                    <?php
                                            if ($user['role_id'] == 1) {
                                                echo 'Admin';
                                            } else if ($user['role_id'] == 2) {
                                                echo 'Editer';
                                            } else {
                                                echo 'User';
                                            }
                                            ?>
                                </option>
                                <?php endforeach; ?>
                                <option value="1">Admin</option>
                                <option value="2">Editor</option>
                                <option value="3">User</option>

                            </select>
                            <div class="invalid-feedback">Please provide a valid Delegation of Powers</div>.

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="validationCustom03" class="col-sm-3 col-form-label">Account</label>
                        <div class="input-group col-sm-9">
                            <select class="custom-select" id="validationCustom03" name="type">
                                <?php
                                    $counter = 0;
                                    foreach ($user as $key => $value) :
                                        $counter++;
                                        if ($counter >= 2) {
                                            break;
                                        }
                                    ?>
                                <option selected value="<?php echo $user['type'] ?>"
                                    <?php $user['type'] == $user['type'] ?   'selected' : ''; ?>>
                                    <?php echo $user['type'] ?></option>
                                <?php endforeach; ?>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <div class="invalid-feedback">Please provide a valid Account</div>.

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="validationCustom03" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" name="address" class="form-control" id="validationCustom03"
                                placeholder="Address" value="<?php echo $user['address'] ?>" />
                            <div class="invalid-feedback">Please provide a valid Account</div>.
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="exampleInputUsername2 validationCustom02"
                            class="col-sm-3 col-form-label">Avatar</label>
                        <div class="col-sm-6">
                            <input type="file" name="avatar" class="form-control"
                                id="exampleInputUsername2 validationCustom02" placeholder="Avatar"
                                value="<?php echo $user['avatar'] ?>" required />
                            <div class="invalid-feedback">Please provide a valid Avatar</div>.
                        </div>

                        <img src="../../Public/User-image/<?php echo $user['avatar'] ?> " width=" 200" height="150"
                            alt="<?php echo $user['avatar'] ?>">
                    </div>

                    <div class="form-group row">
                        <label for="validationCustom03" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" name="phone" class="form-control" id="validationCustom03"
                                placeholder="Phone" value="<?php echo $user['phone'] ?>" />
                            <div class="invalid-feedback">Please provide a valid Phone</div>.
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2" name="updateUser"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <form class="row g-3 needs-validation" novalidate
        action="<?php echo BASE_URL ?>Admin/updateUser/<?php echo $user['id'] ?>" method="POST" role="form"
                                enctype="multipart/form-data" style="width:1200px;margin:auto;">
                            <div class="form-group">
                                <h1 class="text-center"> Register Account
                                </h1>
                            </div>
                            <div class="form-row">
                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Name</label>
                                    <input type="text" name="name" id="validationCustom03"
                                        value="<?php echo $user['name'] ?>" class="form-control"
                                        placeholder=" Enter Name">
                                </div>

                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Email</label>
                                    <input type="email" name="email" id="validationCustom03"
                                        value="<?php echo $user['email'] ?>" class="form-control"
                                        placeholder="Enter Title Email">
                                </div>

                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Password</label>
                                    <input type="text" name="password" id="validationCustom03"
                                        value="<?php echo $user['password'] ?>" class="form-control"
                                        placeholder="Enter  password">
                                </div>


                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Delegation of Powers</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="validationCustom03" name="role_id">
                                            <?php $counter = 0;
                                            foreach ($user as $key => $value) :
                                                $counter++;
                                                if ($counter >= 2) {
                                                    break;
                                                } ?>
                                            <option selected value="<?php echo $user['role_id'] ?>"
                                                <?php $user['role_id'] == $user['role_id'] ?   'selected' : ''; ?>>
                                                <?php
                                                if ($user['role_id'] == 1) {
                                                    echo 'Admin';
                                                } else if ($user['role_id'] == 2) {
                                                    echo 'Editer';
                                                } else {
                                                    echo 'User';
                                                }
                                                ?>
                                            </option>
                                            <?php endforeach; ?>
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
                                            <?php
                                            $counter = 0;
                                            foreach ($user as $key => $value) :
                                                $counter++;
                                                if ($counter >= 2) {
                                                    break;
                                                }
                                            ?>
                                            <option selected value="<?php echo $user['type'] ?>"
                                                <?php $user['type'] == $user['type'] ?   'selected' : ''; ?>>
                                                <?php echo $user['type'] ?></option>
                                            <?php endforeach; ?>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Address</label>
                                    <input type="type" name="address" id="validationCustom03"
                                        value="<?php echo $user['address'] ?>" class="form-control"
                                        placeholder="Enter address post">
                                </div>

                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">Avatar</label>
                                    <input type="file" name="avatar" id="validationCustom03" value=""
                                        class="form-control" placeholder="Enter  avatar">

                                </div>
                                <div class="form-outline col-md-4 mb-3">
                                    <img src=" ../../Public/User-image/<?php echo $user['avatar'] ?> " width=" 200"
                                        height="150" alt="<?php echo $user['avatar'] ?>">
                                </div>
                                <div class="form-outline col-md-4 mb-3">
                                    <label for="validationCustom03">phone</label>
                                    <input type="number" name="phone" id="validationCustom03"
                                        value="<?php echo $user['phone'] ?>" class="form-control"
                                        placeholder="Enter phone post">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="updateUser">Block
                                    level
                                    button</button>
                            </div>
                </form> -->
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
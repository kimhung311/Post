<div class="main-panel ">

    <?php
    if (!empty($_GET['msg'])) {
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value) {
            echo '<span class="btn btn-warning">' . $value . '</span>';
        }
    }
    ?>


    <form class="row g-3 needs-validation" novalidate action="<?php echo BASE_URL ?>Admin/AddRegister" method="POST"
        role="form" enctype="multipart/form-data" style="width:1200px;margin:auto;">

        <h1 class="text-center text-danger"> Register Account </h1>
        <div class="form-row">


            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom02">Email address</label>
                <input type="email" name="email" id="validationCustom02" class="form-control" placeholder="Enter email"
                    required>
                <div class="invalid-feedback">Please provide a valid Email.</div>
            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom03">Password</label>
                <input id="validationCustom03" type="password" name="password" id="title" class="form-control"
                    placeholder="Enter Title password" required>
                <div class="invalid-feedback">Please provide a valid Password</div>.
            </div>

            <div class="form-outline col-md-6 mb-3">
                <label for="">Account</label>
                <div class="input-group">
                    <select class="custom-select" id="validationCustom04" name="type" required>
                        <option selected value="admin">Choose Right</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <div class="invalid-feedback">Please provide a valid Account.</div>
                </div>
            </div>

            <div class="form-outline col-md-6 mb-3">
                <label for="validationCustom05">Delegation of Powers</label>
                <div class="input-group">
                    <select class="custom-select" id="validationCustom03" name="role_id" required>
                        <option selected value="2">Choose Right</option>
                        <option value="1">Admin</option>
                        <option value="2">Editor</option>
                        <option value="3">User</option>
                    </select>
                    <div class="invalid-feedback">Please provide a valid Delegation of Powers.</div>
                </div>
            </div>

            <div class="form-outline col-md-12">
                <label for="validationCustom06">Address</label>
                <input id="validationCustom06" type="type" name="address" id="address" class="form-control"
                    placeholder="Enter address post" required>
                <div class="invalid-feedback">Please provide a valid Address.</div>

            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom07">Avatar</label>
                <input id="validationCustom07" type="file" name="avatar" id="avatar" class="form-control"
                    placeholder="Enter avatar " required>
                <div class="invalid-feedback">Please provide a valid Avatar.</div>

            </div>

            <div class="form-outline col-md-4 mb-3">
                <label for="validationCustom08">Phone</label>
                <input id="validationCustom08" type="number" name="phone" id="phone" class="form-control"
                    placeholder="Enter phone post" required>
                <div class="invalid-feedback">Please provide a valid Phone.</div>

            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="AddRegister">Block level
                button</button>
        </div>
    </form>
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
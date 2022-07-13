  <div class="main-panel">
      <div class="col-md-10 mx-auto mt-5 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title"> Form Add Categories</h4>
                  <p class="card-description"></p>
                  <form class="forms-sample needs-validation" novalidate role="form"
                      action="<?php echo BASE_URL ?>Category/insertCategory" method="post">
                      <div class="form-group form-outline row">
                          <label for="exampleInputUsername2 validationCustom02" class="col-sm-3 col-form-label">Category
                              Name</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" name="category_name"
                                  id="exampleInputUsername2 validationCustom02" placeholder="Username" required />
                              <div class="invalid-feedback">Please provide a valid Category Name.</div>
                          </div>

                      </div>
                      <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                      <button type="submit" name="insertCategory" class="btn btn-success btn-rounded btn-fw"> Submit
                      </button>
                      <button class="btn btn-light">Cancel</button>
                  </form>
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
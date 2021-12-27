  <div class="main-panel">
      <div class="form-group">
          <h1 class="text-center">ADD CATEGORY </h1>
          <form class="row g-3 needs-validation" novalidate action="<?php echo BASE_URL ?>category/insertcategory"
              method="post" role="form" enctype="multipart/form" style="width:1200px;margin:auto;">

              <div class="form-outline col-md-6 mb-5">
                  <label for="validationCustom01">Name</label>
                  <input type="text" id="validationCustom01" name=" category_name" class="form-control"
                      placeholder="Enter category name">
              </div>

              <div class="form-outline col-md-6 mb-5">
                  <label for="inputGroupSelect01">Paren_id</label>
                  <select class="custom-select" id="validationCustom01" name="paren_id">
                      <?php foreach ($categories as $key => $value) : ?>
                      <option value="<?php echo $value['id'] ?>">
                          <?php echo $value['category_name'] ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

              <button type="submit" name="addcategory" class="btn btn-primary btn-lg btn-block">Submit</button>
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
   <div class="main-panel">
       <?php
        foreach ($categorybyid as $category) :
        ?>
       <form action="<?php echo BASE_URL ?>category/updatecategory/<?php echo $category['id'] ?>" method="POST"
           role="form" enctype="multipart/form-data">

           <h1>
               <legend class="text-center">Edit category</legend>
           </h1>

           <div class="form-group">
               <input name="id" type="hidden" value="<?php echo $category['id'] ?>" placeholder="" class="form-control"
                   id="" placeholder="Input field" readonly>
               <label for="">Category Name </label>
               <input name="category_name" type="text" value="<?php echo $category['category_name'] ?> "
                   class="form-control" id="" placeholder="Input field">
           </div>

           <div class="input-group mb-6">
               <label for="inputGroupSelect01">Parent_Id</label>
               <select class="custom-select" id="inputGroupSelect01" name="paren_id">
                   <?php foreach ($categorybyid as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>"
                       <?php $value['id'] == $category['id'] ?   'selected' : ''; ?>>
                       <?php echo $value['category_name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>

           <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

           <button type="submit" name="updatecategory" class="btn btn-primary">SAVE</button>
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
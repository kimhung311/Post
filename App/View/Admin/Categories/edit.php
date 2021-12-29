   <div class="main-panel  text-center">

       <?php
        foreach ($categorybyid as $category) :
        ?>
       <h1>
           <legend class="text-center">Edit category</legend>
       </h1>
       <form class="row g-3 needs-validation text-center" novalidate
           action="<?php echo BASE_URL ?>Category/updateCategory/<?php echo $category['id'] ?>" method="POST"
           role="form" enctype="multipart/form-data" style="width:1200px; text-align:center;">

           <div class="form-group col-md-6 mb-">
               <input name="id" type="hidden" value="<?php echo $category['id'] ?>" placeholder="" class="form-control"
                   id="" placeholder="Input field" readonly>
               <label for="">Category Name </label>
               <input name="category_name" type="text" value="<?php echo $category['category_name'] ?> "
                   class="form-control " id="" placeholder="Input field" required>
           </div>

           <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

           <button type="submit" name="updateCategory" class="btn btn-primary">SAVE</button>
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
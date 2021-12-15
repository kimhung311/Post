  <?php
    include('App/View/Admin/Layouts/master.php');
    ?>
  <div class="main-panel ">
      <h1 class="text-center">ADD Post
      </h1>
      <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span class="btn btn-warning">' . $value . '</span>';
            }
        }
        ?>
      <form action="<?php echo BASE_URL ?>post/insert_post" method="POST" role="form" enctype="multipart/form-data"
          style="width:700px;margin:auto;">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" Enter Name post">
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Categories</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="category_id">
                  <?php foreach ($categories as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>">
                      <?php echo $value['name'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Admin</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="user_id">
                  <?php foreach ($user as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>">
                      <?php echo $value['name'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>

          <div class="form-group">
              <label for="">Title</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title post">
          </div>

          <div class="form-group">
              <label for="">Content</label>
              <textarea class="form-control mytextarea" type="text" name="content" id="content" cols="140" rows="10"
                  placeholder="Enter your content"></textarea>
          </div>

          <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control mytextarea" type="text" name="description" id="description" cols="140"
                  rows="10" placeholder="Enter your description"></textarea>
          </div>

          <div class="form-group">
              <label for="">Picture</label>
              <input type="file" name="picture" id="picture" class="form-control" placeholder="Enter Picture post">
          </div>

          <div class="form-group">
              <label for="">Image_detail</label>
              <input type="file" name="image_detail" id="image_detail" class="form-control"
                  placeholder="Enter Image_detail post">
          </div>

          <button type="submit" class="btn btn-primary" name="insert_post">ADD</button>
      </form>
  </div>
  </div>
  </div>

  <script>
tinymce.init({
    selector: '.mytextarea'
});
  </script>

  <?php
    include('App/View/Admin/Layouts/footer.php');
    ?>
  <?php
    include('App/View/Admin/Layouts/master.php');
    ?>

  <div class="main-panel ">

      <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span class="btn btn-warning">' . $value . '</span>';
            }
        }
        ?>

      <form action="<?php echo BASE_URL ?>admin/add_register" method="POST" role="form" enctype="multipart/form-data"
          style="width:1200px;margin:auto;">
          <div class="form-group">
              <h1 class="text-center"> Register Account
              </h1>
          </div>
          <div class="form-row">
              <div class=" col-md-4 mb-3">
                  <label for="">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder=" Enter Name">
              </div>

              <div class=" col-md-4 mb-3">
                  <label for="">Email</label>
                  <input type="email" name="email" id="title" class="form-control" placeholder="Enter Title Email">
              </div>

              <div class="col-md-4 mb-3">
                  <label for="">Password</label>
                  <input type="text" name="password" id="title" class="form-control" placeholder="Enter Title password">
              </div>
              <div class="col-md-4 mb-3">
                  <label for="validationDefaultUsername">Account</label>
                  <div class="input-group">
                      <select class="custom-select" id="inputGroupSelect01" name="type">
                          <option selected>Choose Right</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                      </select>
                  </div>
              </div>

              <div class="col-md-4 mb-3">
                  <label for="validationDefaultUsername">Delegation of Powers</label>
                  <div class="input-group">
                      <select class="custom-select" id="inputGroupSelect01" name="role_id">
                          <option selected>Choose Right</option>
                          <option value="1">Admin</option>
                          <option value="2">Editor</option>
                          <option value="3">User</option>
                      </select>
                  </div>
              </div>

              <div class="col-md-6">
                  <label for="">Address</label>
                  <input type="type" name="address" id="address" class="form-control" placeholder="Enter address post">
              </div>

              <div class="col-md-4 mb-3">
                  <label for="">Avatar</label>
                  <input type="file" name="avatar[]" id="avatar" class="form-control" placeholder="Enter  avatar">
              </div>

              <div class="col-md-4 mb-3">
                  <label for="">phone</label>
                  <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter phone post">
              </div>
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="add_register">Block level
                  button</button>
          </div>
      </form>
  </div>
  </div>
  </div>
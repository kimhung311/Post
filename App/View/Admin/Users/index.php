<?php include('App/View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of Posts
        <div class="row">
            <a href="<?php echo BASE_URL ?>admin/register" class="btn btn-info"><i
                    class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
        </div>
    </h1>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role_id</th>
                <th>Type</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Action</th>
                <?php
                if (!empty($_GET['msg'])) {
                    $msg = unserialize(urldecode($_GET['msg']));
                    foreach ($msg as $key => $value) {
                        echo '<span class="btn btn-warning">' . $value . '</span>';
                    }
                }
                if (isset($_GET['Message'])) {
                    echo $_GET['Message'];
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $key => $value) : ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['role_id'] ?></td>
                <td><?php echo $value['type'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td>
                    <img src="<?php echo URL_USER . $value['avatar'] ?>" width="100" height="150"
                        alt="<?php echo $value['avatar'] ?>">
                </td>
                <td>
                    <a href="<?php echo BASE_URL ?>admin/edit_user/<?php echo $key ?>" class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $key ?>')">Edit</a>
                    <a href="<?php echo BASE_URL ?>post/delete_post/<?php echo $value['posts_id'] ?>"
                        class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this:')">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div> <?php
        include('App/View/Admin/Layouts/footer.php');
        ?>
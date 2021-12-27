<div class="main-panel">
    <h1 class="text-center">List of Posts
        <div class="row">
            <a href="<?php echo BASE_URL ?>admin/register" class="btn btn-info"><i
                    class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
        </div>
        <?php include('App/View/Message/message.php') ?>
    </h1>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Permission</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $key => $value) : ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php if ($value['role_id'] == 1) {
                        echo '<a class="btn btn-warning">Admin</a>';
                    } else if ($value['role_id'] ==  2) {
                        echo '<a class="btn btn-warning">Editer</a>';
                    } ?>
                </td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td>
                    <img src="<?php echo URL_USER . $value['avatar'] ?>" width="100" height="150"
                        alt="<?php echo $value['avatar'] ?>">
                </td>
                <td>
                    <a href="<?php echo BASE_URL ?>admin/edit_user/<?php echo $value['id'] ?>" class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $value['id'] ?>')">Edit</a>
                    <a href="<?php echo BASE_URL ?>admin/delete_user/<?php echo $value['id'] ?>" class="btn btn-danger"
                        onclick="return confirm('<?php echo 'Are you sure you want to delete this: ' . ' ' . $key ?>')">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = 3; // số link trưuóc và sau khi hiện hành
    $row = 3;  // đọ lớn hiẻn thị limit 1 trang
    $from = ($page - 1) * $row;
    $colum = $page - 3;
    $to = $page + 3;
    $colum = $page - $offset;
    if ($colum < 1) $colum = 1;
    $to = $page + $offset;
    $Previous = $page - 1;
    $Next = $page + 1;
    // if($to > $pagenum) $to
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($page > 1) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>admin/list_admin&page=<?php echo $Previous; ?>">Previous</a>
            </li>
            <?php } ?>
            <?php

            for ($i = $colum; $i < $to; $i++) {
            ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>admin/list_admin&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php } ?>
            <?php if ($colum >= $page) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>admin/list_admin&page=<?php echo $Next; ?>">Next</a>
            </li>
            <?php } ?>
        </ul>
    </nav>

</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>
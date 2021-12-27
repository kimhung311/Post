<div class="main-panel">
    <h1 class="text-center">List of Posts
        <div class="row">
            <a href="<?php echo BASE_URL ?>post/add_post" class="btn btn-info"><i
                    class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
        </div>
        <?php include('App/View/Message/message.php') ?>
    </h1>

    <table class="table table-light table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Category_Name</th>
                <th>Creator</th>
                <th>Title</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $key => $value) : ?>
            <tr>
                <td><?php echo $value['posts_id'] ?></td>

                <td><?php echo $value['category_name'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td>
                    <?php echo $value['title'] ?>
                </td>
                <td>
                    <a href="<?php echo BASE_URL ?>post/detail/<?php echo $value['posts_id'] ?>"
                        class="btn btn-primary">Detail</a>
                </td>
                <td>
                    <a href="<?php echo BASE_URL ?>/post/editpost/<?php echo $value['posts_id'] ?>"
                        class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $value['posts_id'] ?>')">Edit</a>
                    <a href="<?php echo BASE_URL ?>post/delete_post/<?php echo $value['posts_id'] ?>"
                        class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this:')">Del</a>
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
                    href="<?php echo BASE_URL ?>Post/index&page=<?php echo $Previous; ?>">Previous</a>
            </li>
            <?php } ?>
            <?php

            for ($i = $colum; $i < $to; $i++) {
            ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>Post/index&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php } ?>
            <?php if ($colum >= $page) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>Post/index&page=<?php echo $Next; ?>">Next</a>
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
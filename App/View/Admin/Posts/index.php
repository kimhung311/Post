<div class="main-panel">
    <div class="col-lg-12 mt-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Table List Post</h1>
                <p class="card-description float-right"> <a href="<?php echo BASE_URL ?>post/AddPost"
                        class="btn btn-info"><i class=" fa fa-calendar-plus fa-5x"></i>
                        ADD NEW
                    </a>
                </p>
                <?php include('App/View/Message/message.php') ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="table-info">STT</th>
                                <th class="table-primary">Title</th>
                                <th class="table-success">Creator</th>
                                <th class="table-warning">Category Name</th>
                                <th class="table-danger" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($posts as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value['posts_id'] ?></td>
                                <td>
                                    <?php echo $value['title'] ?>
                                </td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['category_name'] ?></td>

                                <td>
                                    <a href="<?php echo BASE_URL ?>Post/Detail/<?php echo $value['posts_id'] ?>"
                                        class="btn btn-primary">Detail <i class="fas fa-eye"
                                            style="font-size:24px"></i></a>
                                    <a href="<?php echo BASE_URL ?>/Post/editPost/<?php echo $value['posts_id'] ?>"
                                        class="btn btn-primary"
                                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $value['posts_id'] ?>')">Edit
                                        <i class="far fa-edit" style="font-size:24px"></i></a>
                                    <a href=" <?php echo BASE_URL ?>post/deletePost/<?php echo $value['posts_id'] ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this:')">Del <i
                                            class="fas fa-folder-minus" style="font-size:24px"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php }  ?>
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
                    <nav aria-label="Page navigation example " style="float: right;margin-top:20px;">
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
    </div>


</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>
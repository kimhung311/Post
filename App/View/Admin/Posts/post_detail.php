<?php include('View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of Posts_Detail</h1>
    <div class="row">
        <a href="?controller=post&action=index" class="btn btn-info"><i class=" fa fa-calendar-plus fa-5x"></i>
            Back List Post
        </a>
    </div>
    </h1>
    <table class="table table-light table-hover ">
        <thead class="thead-light">
            <tr>
                <th>CONTENT</th>
                <th>DESCRIPTION</th>
                <th>PICTURE</th>
                <th>IMAGE</th>
                <th>CREATED</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" readonly>
                        <?php echo $post['content'] ?>
                    </textarea>
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" readonly>
                        <?php echo $post['description'] ?>
                    </textarea>
                </td>
                <td>
                    <img src="<?php echo $post['picture'] ?>" alt="">
                </td>
                <td>
                    <img src="<?php echo $post['image_detail'] ?>" alt="">
                </td>
                <td><?php echo $post['created_at'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div> <?php
        include('View/Admin/Layouts/footer.php');
        ?>
<div class="main-panel">
    <h1 class="text-center">List of Posts_Detail</h1>
    <div class="row">
        <a href="<?php echo BASE_URL ?>post/index"" class=" btn btn-info"><i class=" fa fa-calendar-plus fa-5x"></i>
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
                <!-- <th>CREATED</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postbyid as $key => $value) : ?>
            <tr>
                <td>
                    <textarea name="" id="" cols="30" rows="10" class="form-control mytextarea" readonly>
                        <?php echo $value['content'] ?>
                    </textarea>
                </td>
                <td>
                    <textarea name="" id="" cols="30" rows="10" class="form-control mytextarea" readonly>
                        <?php echo $value['description'] ?>
                    </textarea>
                </td>
                <td>
                    <img src="<?php echo URL_Post_Detail . $value['picture'] ?>"
                        style="width:200px ;height:150px;border-radius: inherit;" alt="">
                </td>
                <td><img src="<?php echo URL_Detail . $value['image_detail'] ?>"
                        style="width:200px ;height:150px;border-radius: inherit;" alt="">
                </td>
                <!-- <td><?php echo $value['created_at'] ?></td> -->
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
</div>
</div>
<script>
tinymce.init({
    selector: '.mytextarea'
});
</script>
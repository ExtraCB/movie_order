<div class="">
    <a href="" class="btn btn-default btn-rounded mb-4" data-bs-toggle="modal" data-bs-target="#createMovie">Create
        Movie</a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="createMovie" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Create Movie</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form ">
                        <input type="text" id="defaultForm-email" name="name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Name Movie</label>
                    </div>
                    <div class="md-form ">
                        <input type="text" id="defaultForm-email" name="price" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Price Movie</label>
                    </div>
                    <div class="md-form ">
                        <input type="file" id="defaultForm-email" name="file" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Image Movie</label>
                    </div>
                    <div class="md-form ">
                        <input type="date" id="defaultForm-email" name="date" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Date Movie</label>
                    </div>
                    <div class="md-form ">
                        <select name="type" id="">
                            <option value="" selected> Please Select type</option>
                            <?php 
                            $db -> select("type_movies","*");
                            while($type = $db -> query -> fetch_object()) {
                            ?>
                            <option value="<?= $type -> id_mtype ?>"> <?= $type -> name_mtype ?></option>
                            <?php }  ?>
                        </select>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Type Movie</label>
                    </div>
                </div>
                <div class="modal-footer px-4 d-flex justify-content-between">
                    <button class="btn btn-warning" name="create">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
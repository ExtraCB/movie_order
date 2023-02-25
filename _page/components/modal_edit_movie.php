<div class="">
    <a href="" class="btn btn-default btn-rounded mb-4" data-bs-toggle="modal"
        data-bs-target="#editMovie<?= $movie -> id_m ?>">Edit
        Movie</a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editMovie<?= $movie -> id_m ?>" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Movie</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="row">
                        <div class="md-form ">
                            <input type="text" id="defaultForm-email" name="name" value="<?= $movie -> name_m ?>"
                                class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Name Movie</label>
                            <input type="hidden" name="id_m" value="<?= $movie -> id_m ?>">
                        </div>
                        <div class="md-form ">
                            <input type="text" id="defaultForm-email" name="price" class="form-control validate"
                                value="<?= $movie -> price_m ?>">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Price Movie</label>
                        </div>
                        <div class="md-form ">
                            <input type="file" id="defaultForm-email" name="file" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Image Movie</label>
                            <input type="hidden" name="fileold" value="<?= $movie -> file_m ?>">
                        </div>
                        <div class="md-form ">
                            <input type="date" id="defaultForm-email" name="date" class="form-control validate"
                                value="<?= $movie -> date_m ?>">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Date Movie</label>
                        </div>
                        <div class="md-form mb-2">
                            <select name="type" id="">
                                <?php 
                                $db_type = new database();
                            $db_type -> select("type_movies","*");
                            while($type = $db_type -> query -> fetch_object()) {
                            ?>
                                <option value="<?= $type -> id_mtype ?>"
                                    <?= ($type -> id_mtype == $movie -> type_m) ? "selected" : "" ?>>
                                    <?= $type -> name_mtype ?></option>
                                <?php }  ?>
                            </select>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Type Movie</label>
                        </div>
                        <button class="btn btn-warning" name="edit">Edit</button>
                    </div>
                    <div class="row mt-5">
                        <h4>Add Showtime</h4>
                        <div class="md-form ">
                            <div class="input-group">
                                <input type="time" id="defaultForm-email" name="time" value="<?= $movie -> name_m ?>"
                                    class="form-control validate">
                                <button class="btn btn-warning" name="showtime">Add</button>
                            </div>

                            <label data-error="wrong" data-success="right" for="defaultForm-email">Showtime</label>

                        </div>
                    </div>

                    <div class="row mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Time</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $db2 = new database();
                                $id_movie_db2 = $movie -> id_m;
                                $db2 -> select("showtimes","*","m_st = $id_movie_db2");
                                while($st = $db2 -> query -> fetch_object()){?>
                                <tr>
                                    <td><?= $st -> id_st ?></td>
                                    <td><?= $st -> time_st ?></td>
                                    <input type="hidden" name="id_st" value="<?= $st -> id_st ?>">
                                    <td><button type="submit" class="btn btn-outline-primary"
                                            name="remove">Delete</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
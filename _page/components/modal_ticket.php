<?php 
$seat = ["A","B","C"];
?>
<div class="">
    <a href="" class="btn btn-default btn-outline-secondary btn-rounded mb-4" data-bs-toggle="modal"
        data-bs-target="#editMovie<?= $movie -> id_m ?>">Ticket
        Movie</a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editMovie<?= $movie -> id_m ?>" data-bs-keyboard="false" data-bs-backdrop="static"
        tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Seat Movie</h4>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <table class="table table-hover">
                        <tbody>
                            <?php 
                            foreach($seat as $value){

                            ?>
                            <tr>
                                <th>
                                    <h3><?= $value ?></h3>
                                </th>
                                <?php
                                $st_id = $_SESSION['st'];
                                $db_seat_a = new database();
                                $db_seat_a -> select("tickets","*","st_tk = $st_id AND seat_tk LIKE '%$value%'");
                                while($fetch_seat_a = $db_seat_a -> query -> fetch_object()){ 
                                ?>
                                <td>
                                    <?php if($fetch_seat_a -> status_tk == 0){ ?>
                                    <a href="" class="btn btn-secondary" disabled><?= $fetch_seat_a -> seat_tk ?>
                                    </a>
                                    <?php } else { ?>
                                    <a href="./Homepage.php?id_seat=<?= $fetch_seat_a -> id_tk ?>"
                                        class="btn btn-success"
                                        onclick="return confirm('Confirm for Purchase Ticket')"><?= $fetch_seat_a -> seat_tk ?>
                                    </a>
                                    <?php } ?>

                                </td>
                                <?php }  ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
</div
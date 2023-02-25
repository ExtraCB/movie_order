


<div class="modal fade" id="exampleModalToggle<?= $id_st ?>" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Seat</th>
                                <th>Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $detail_2 = new database();
                            $detail_2 -> select("showtimes,tickets,order_ticket,users","*","id_st = $id_st AND st_tk = id_st AND status_tk = 0 AND ticket_or = id_tk AND own_or = id_user");
                            
                            while($fetch_detail_2 = $detail_2 -> query -> fetch_object())  {
                            ?>
                            <tr>
                                <td><?= $fetch_detail_2 -> id_st ?></td>
                                <td><?= $fetch_detail_2 -> time_st ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="./../../file/<?= $fetch_detail_2 -> file_user ?>" alt=""
                                            style="width: 45px; height: 45px" class="rounded-circle" />
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?= $fetch_detail_2 -> username_user ?></p>
                                            <p class="text-muted mb-0">
                                                <?= $fetch_detail_2 -> fname_user .' '.$fetch_detail_2->lname_user ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle<?= $movie->id_m ?>"
                    data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
            </div>
        </div>
    </div>
</div>
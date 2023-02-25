<div class="modal fade" id="exampleModalToggle<?= $movie->id_m ?>" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>showtime</th>
                                <th>income</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $detail_1 = new database();
                            $detail_1 -> select("order_ticket,tickets,showtimes,movie","id_st,time_st,SUM(price_m) as sum","ticket_or = id_tk AND st_tk = id_st AND m_st = $id_m AND id_m = $id_m GROUP BY id_st");
                            
                            while($fetch_detail_1 = $detail_1 -> query -> fetch_object())  {

                                $id_st = $fetch_detail_1 -> id_st;
                            ?>
                            <tr>
                                <td><?= $fetch_detail_1 -> id_st ?></td>
                                <td><?= $fetch_detail_1 -> time_st ?></td>
                                <td><?= $fetch_detail_1 -> sum ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle<?= $movie->id_m ?>" role="button">Open
    Detail</a>
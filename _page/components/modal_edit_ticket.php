<?php 
$seat = ["A","B","C"];
?>
<div class="">
    <a href="" class="btn btn-default btn-outline-secondary btn-rounded mb-4" data-bs-toggle="modal"
        data-bs-target="#editMovie<?= $history -> id_st ?>">Edit Ticket</a>
</div>
<div class="modal fade" id="editMovie<?= $history -> id_st ?>" data-bs-keyboard="false" data-bs-backdrop="static"
    tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Seat history</h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body mx-3">
                <table class="table table-hover">
                    <form action="./History_Ticket.php" method="get">
                        <tbody>
                            <?php 
                            foreach($seat as $value){

                            ?>
                            <tr>
                                <th>
                                    <h3><?= $value ?></h3>
                                </th>
                                <?php
                                $db_seat_a = new database();
                                $st_tk = $history -> id_st;
                                $db_seat_a -> select("tickets","*","st_tk = $st_tk AND seat_tk LIKE '%$value%'");
                                while($fetch_seat_a = $db_seat_a -> query -> fetch_object()){ 
                                ?>
                                <td>
                                    <?php if($fetch_seat_a -> status_tk == 0){ ?>
                                    <a href="" class="btn btn-secondary" disabled><?= $fetch_seat_a -> seat_tk ?>
                                    </a>
                                    <?php } else { ?>
                                    <a class="btn btn-success"
                                        href="./History_Ticket.php?new_seat=<?= $fetch_seat_a -> id_tk ?>&old_seat=<?= $history -> id_tk ?>&id_or=<?= $history -> id_or ?>"><?= $fetch_seat_a -> seat_tk ?></a>
                                    <?php } ?>

                                </td>
                                <?php }  ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
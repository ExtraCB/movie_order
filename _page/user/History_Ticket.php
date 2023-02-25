<?php 
session_start();
include('./../../_system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();
$userid = $_SESSION['userid'];


if(isset($_GET['new_seat'],$_GET['old_seat'])){
    $new_seat = $_GET['new_seat'];
    $old_seat = $_GET['old_seat'];
    $id_or = $_GET['id_or'];
    $db -> update("tickets",['status_tk' => 1],"id_tk = $old_seat");
    $db -> update("tickets",['status_tk' => 0],"id_tk = $new_seat");
    $db -> update("order_ticket",['ticket_or' => $new_seat],"id_or = $id_or");
    header('location:./History_Ticket.php');
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <script defer src="./../../style/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./../../style/css/bootstrap.css">


</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php include('./../components/navbar_user.php');?>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <!-- Movie All -->
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>เรื่อง</th>
                            <th>ที่นั่ง</th>
                            <th>ราคา</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $db_history = new database();
                        $db_history -> select("order_ticket,tickets,showtimes,movie","*","own_or = $userid AND ticket_or = id_tk AND st_tk = id_st AND m_st = id_m");

                        while($history = $db_history -> query ->fetch_object()){ 
                           
                        ?>

                        <tr>
                            <td><?= $history -> name_m ?></td>
                            <td><?= $history -> seat_tk  ?></td>
                            <td><?= $history -> price_m ?></td>
                            <td><?php include('./../components/modal_edit_ticket.php'); ?></td>
                        </tr>
                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!--Main layout-->
</body>

</html>
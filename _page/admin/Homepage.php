<?php 
session_start();
include('./../../_system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();
$db -> checkAdmin();
$userid = $_SESSION['userid'];


$dbsum = new database();
$dbsum -> select("order_ticket,tickets,showtimes,movie","SUM(price_m) as sum"," ticket_or = id_tk AND st_tk = id_st AND m_st = id_m");
$fetchsum = $dbsum -> query -> fetch_assoc();


$datecurrent = date("Y-m-d");
$dbsum2 = new database();
$dbsum2 -> select("order_ticket,tickets,showtimes,movie","SUM(price_m) as sum"," timestamp_or = '$datecurrent' AND ticket_or = id_tk AND st_tk = id_st AND m_st = id_m");
$fetchsum2 = $dbsum2 -> query -> fetch_assoc();

$monthcurrent = date("Y-m");
$dbsum3 = new database();
$dbsum3 -> select("order_ticket,tickets,showtimes,movie","SUM(price_m) as sum"," timestamp_or LIKE '%$monthcurrent%' AND ticket_or = id_tk AND st_tk = id_st AND m_st = id_m");
$fetchsum3 = $dbsum3 -> query -> fetch_assoc();


$dbsum2 = new database();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="./../../style/css/admin_hp.css">
    <script defer src="./../../style/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./../../style/css/bootstrap.css">


</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php include('./../components/sidebar.php');?>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">

            <!-- card show stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        ยอดขายทั้งหมด </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fetchsum['sum'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        ยอดขายวันนี้</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fetchsum2['sum'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        ยอดขายในเดือนนี้</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fetchsum3['sum'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Movie All -->
            <?php 
            $dbdate = new database();
            $dbdate -> selectgb("movie","timestamp_m as date","GROUP BY timestamp_m");
            while($fetchdate = $dbdate -> query -> fetch_object()) {
                $date = $fetchdate -> date;
            ?>
            <div class="row mt-5">
                <h3><?= $date ?></h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <?php
                $db2 = new database();
                $db2 -> select("movie,type_movies","*","type_m = id_mtype AND timestamp_m LIKE '%$date%'");
                while($movie = $db2 -> query -> fetch_object()){
                    $id_m = $movie -> id_m;
                    $dbsum2 -> select("order_ticket,tickets,showtimes,movie","SUM(price_m) as sum","ticket_or = id_tk AND st_tk = id_st AND m_st = id_m AND id_m = $id_m");
                    $fetchsum2 = $dbsum2 -> query -> fetch_assoc();
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="../../file/<?= $movie -> file_m ?>" class="card-img-top" alt="Skyscrapers"
                                style="width:auto; height:150px;" />
                            <div class="card-body">
                                <h5 class="card-title"><?= $movie -> name_m ?></h5>
                                <p class="card-text">Price : <?= $movie -> price_m ?></p>
                                <p class="card-text">Type : <?= $movie -> name_mtype ?></p>
                                <p class="card-text">Date : <?= $movie -> date_m ?></p>
                                <p class="card-text">Sum : <?= $fetchsum2['sum'] ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <?php 
                                if($fetchsum2['sum'] == ''){

                                }else{
                                    include('./../components/modal_detail_showtime.php'); 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

        </div>
    </main>
    <!--Main layout-->
</body>


</html>
<?php 
session_start();
include('./../../_system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();
$userid = $_SESSION['userid'];
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
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $db2 = new database();
                $db2 -> select("movie,type_movies","*","type_m = id_mtype");
                while($movie = $db2 -> query -> fetch_object()){
                ?>
                <div class="col">
                    <form action="./Ticket.php" method="get">
                        <div class="card h-100">
                            <img src="../../file/<?= $movie -> file_m ?>" class="card-img-top" alt="Skyscrapers" />
                            <div class="card-body">
                                <h5 class="card-title"><?= $movie -> name_m ?></h5>
                                <p class="card-text">Price : <?= $movie -> price_m ?></p>
                                <p class="card-text">Type : <?= $movie -> name_mtype ?></p>
                                <p class="card-text">Type : <?= $movie -> date_m ?></p>
                                <select name="st" id="">
                                    <?php 
                                $db3 = new database();
                                $id_movie_db2 = $movie -> id_m;
                                $db3 -> select("showtimes","*","m_st = $id_movie_db2");
                                while($st = $db3 -> query -> fetch_object()){?>
                                    <option value="<?= $st -> id_st ?>"><?= $st -> time_st ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-outline-primary">Ticket</button>
                            </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </main>
    <!--Main layout-->
</body>


</html>
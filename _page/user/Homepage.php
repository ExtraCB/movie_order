<?php 
session_start();
include('./../../_system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();
$userid = $_SESSION['userid'];


if(isset($_GET['id_seat'],$_SESSION['st'])){
    $db_seat = new database();
    $id_seat = $_GET['id_seat'];
    $db_seat -> update("tickets",['status_tk' => 0],"id_tk = $id_seat");
    $db_seat -> insert("order_ticket",['own_or' => $userid,'ticket_or'=>$id_seat]);

    if($db_seat -> query){
        $_SESSION['success'] = "Purchase ticket success !";
        header('location:./Homepage.php');
        return;
    }else{
        $_SESSION['success'] = "Purchase ticket Failed !";
        header('location:./Homepage.php');
        return;
    }
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
                <?php include('./../components/error.php'); ?>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <?php
                
                $db2 = new database();
                $db2 -> select("movie,type_movies","*","type_m = id_mtype AND status_m != 0");
                while($movie = $db2 -> query -> fetch_object()){
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
                            <form action="" method="get">
                                <select name="st" id="" onchange="this.form.submit()" class="form-control">
                                    <?php 
                                $db3 = new database();
                                $id_movie_db2 = $movie -> id_m;
                                $db3 -> select("showtimes","*","m_st = $id_movie_db2");
                                while($st = $db3 -> query -> fetch_object()){ ?>
                                    <option value="<?= $st -> id_st ?>"
                                        <?= ((isset($_SESSION['st'])) && $st -> id_st == $_SESSION['st']) ? "selected" : "" ?>>
                                        <?= $st -> time_st ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                        <div class="card-footer">
                            <?php 
                            if(isset($_SESSION['st'])) { ?>
                            <?php include('./../components/modal_ticket.php'); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <!--Main layout-->
    <?php 
    if(isset($_GET['st'])){
        unset($_SESSION['st']);
        $_SESSION['st'] = $_GET['st'];
        echo "<meta http-equiv='refresh' content='0; url=Homepage.php'>";
        return;
    }
    ?>
</body>

</html>
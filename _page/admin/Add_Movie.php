<?php 
session_start();
include('./../../_system/database.php');

$db = new database();
$currentpage = basename(__FILE__);
$db -> secureCheck();
$db -> checkAdmin();
$userid = $_SESSION['userid'];


$seat = ["A","B","C"];

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $file = $_FILES['file'];
    $fileNew = $db->uploadFile($file);

    $data = [
        'name_m' => $name,
        'file_m' => $fileNew,
        'price_m' => $price,
        'date_m' => $date,
        'type_m' => $type
    ];

    $db -> insert("movie",$data);

    if($db -> query){
        $_SESSION['success'] = "Movie Added !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Movie Added Failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['edit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $file = $_FILES['file'];
    $fileold = $_POST['fileold'];
    $id_m = $_POST['id_m'];

    
    if($file['name'] == ''){
        $fileNew = $fileold;
    }else{
        $fileNew = $db->uploadFile($file);
    }
    $data = [
        'name_m' => $name,
        'file_m' => $fileNew,
        'price_m' => $price,
        'date_m' => $date,
        'type_m' => $type
    ];

    $db -> update("movie",$data,"id_m = $id_m");
    if($db -> query){
        $_SESSION['success'] = "Movie Edit !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Movie Edit Failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['disabled'])){
    $id_m = $_POST['id_m'];

    $db -> update("movie",['status_m' => 0],"id_m = $id_m");
    if($db -> query){
        $_SESSION['success'] = "Movie Disabled !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Movie Disabled Failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['active'])){
    $id_m = $_POST['id_m'];

    $db -> update("movie",['status_m' => 1],"id_m = $id_m");
    if($db -> query){
        $_SESSION['success'] = "Movie actived !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Movie actived Failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['showtime'])){
    $time = $_POST['time'];
    $id_showtime = rand();
    $id_m = $_POST['id_m'];

    $db -> insert("showtimes",[
        'id_st' => $id_showtime,
        'time_st' => $time,
        'm_st' => $id_m
    ]);

    foreach($seat as $value){
        for($i = 1; $i <= 5; $i++){
            $db -> insert("tickets",[
                'seat_tk' => $value.$i,
                'st_tk' => $id_showtime
            ]);
        }
    }

    if($db -> query){
        $_SESSION['success'] = "Showtime added !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Showtime failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['remove'])){
    $id_st = $_POST['id_st'];

    $db -> delete("showtimes","id_st = $id_st");

    if($db -> query){
        $_SESSION['success'] = "Showtime Deleted !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }else{
        $_SESSION['success'] = "Showtime Deleted failed !";
        header('location:'.$_SERVER['REQUEST_URI']);
    }
}
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
            <div class="row">
                <?php include("./../components/error.php") ?>
                <div class="d-flex flex-row  justify-content-between">
                    <div class="input-group-sm ml-3 mb-2">
                        <input type="text" class="form-control" name="search" required />
                        <button type="submit" name="search_submit" class="btn btn-outline-primary">Search</button>
                    </div>
                    <div>
                        <?php include('./../components/modal_create_movie.php'); ?>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php  
                $movie_db = new database();
                $movie_db -> select("movie,type_movies","*","type_m = id_mtype");
                while($movie = $movie_db -> query -> fetch_object()){ ?>
                <div class="col">
                    <div class="card h-100" style="width: 18rem; ">
                        <img src="./../../file/<?= $movie -> file_m ?>" class="card-img-top" alt="Sunset Over the Sea"
                            style="width:auto; height:150px;" />
                        <div class="card-body">
                            <p class="card-text"><?= $movie -> name_m ?></p>
                            <p class="card-text">Type : <?= $movie -> name_mtype ?></p>
                            <p class="card-text">Date : <?= $movie -> date_m ?></p>
                            <p class="card-text">Price : <?= $movie -> price_m ?></p>
                        </div>
                        <div class="card-foooter">
                            <?php include('./../components/modal_edit_movie.php'); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <!--Main layout-->
</body>


</html>
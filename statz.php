<?php
    require_once('vendor/connectdb.php');
    session_start(); 
    $id = $_GET['id_stat'];
    $stats = mysqli_query($link, "SELECT * FROM `stat` WHERE `id`='$id'");
    $stat = mysqli_fetch_assoc($stats);

?>
        <header> 
            <?php require_once 'vendor/header.php'?>
        </header>
        <div class="content">
            <div class="content_left">
                <h2><?= $stat['name']?></h2>
                <img src = "assets/image/<?= $stat['avatarka']?> ">
                <p><?= $stat['kratopisanie']?></p>
            </div>
        </div>
        <div class ="staty">
            <p>
                <?= $stat['opisanie']?> 
            </p>
        </div>

</body>
</html>
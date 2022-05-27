<?php
  require 'vendor/connectdb.php';
  $file_name = basename(__FILE__);
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дарим вкус</title>
</head>
<body>
<div class="wrapper">
            <header>
                <?php require_once 'vendor/header.php'?>
            </header>
                <div class="glav">
                    <img src = "assets/image/risunok.jpg">
                </div> 
                <div class="block">
                    <p>Популярные рецепты</p>
                    <div class="novosti">
                        <section class="retsepts__container">
                            <?php
                                $recs = mysqli_query($link, "SELECT * FROM `recepts` 
                                WHERE `status` = 1 ORDER BY `view` ASC LIMIT 3");
                                while($rec = mysqli_fetch_assoc($recs)){
                                    ?>
                                <div class="retsepty__container">
                                    <div class="retsepty__container_img">
                                        <img src="/assets/img/<?= $rec['img']?>" alt="">
                                    </div>
                                    <a href="/retsept.php?id_retsepty=<?php echo $rec['id']?>">
                                        <h5><?= $rec['name'];?></h5></a>
                                        <p>Описание: <br> <?php 
                                        if(strlen($rec['description']) > 300){
                                            echo substr("{$rec['description']}", 0, 1000).'...';
                                        }else{
                                            echo $rec['description'];
                                        }?></p>
                                </div>
                            <?php }?>
                            
                        </section>
                    </div> 
                <p>Новые рецепты</p>
                <div class="novosti">
                    <section class="retsepts__container">
                        <?php
                            $recs = mysqli_query($link, "SELECT * FROM `recepts` 
                            WHERE `status` = 1 ORDER BY `date` DESC LIMIT 3");
                            while($rec = mysqli_fetch_assoc($recs)){
                                ?>
                            <div class="retsepty__container">
                                <div class="retsepty__container_img">
                                    <img src="/assets/img/<?= $rec['img']?>" alt="">
                                </div>
                                <a href="/retsept.php?id_retsepty=<?php echo $rec['id']?>">
                                    <h5><?= $rec['name'];?></h5></a>
                                    <p>Описание: <br> <?php 
                                    if(strlen($rec['description']) > 300){
                                        echo substr("{$rec['description']}", 0, 1000).'...';
                                    }else{
                                        echo $rec['description'];
                                    }?></p>
                            </div>
                        <?php }?>
                        
                    </section>
                </div>   
                <p>Новости</p>
                <div class="novosti">
                    <section class="retsepts__container">
                        <?php
                            $recsNoUsers = mysqli_query($link, "SELECT * FROM `stat`  ORDER BY id DESC LIMIT 3");
                            while($recNoUsers = mysqli_fetch_assoc($recsNoUsers)){
                                ?>
                            <div class="retsepty__container">
                                <div class="retsepty__container_img">
                                    <img src="/assets/image/<?= $recNoUsers['avatarka']?>" alt="">
                                </div>
                                <a href="statz.php?id_stat=<?= $recNoUsers['id'] ?>">
                                <h5><?= $recNoUsers['name'] ?></h5></a>
                                    <p>Описание: <br> <?php 
                                    if(strlen($recNoUsers['kratopisanie']) > 300){
                                        echo substr("{$recNoUsers['kratopisanie']}", 0, 1000). '...';
                                    }else{
                                        echo $recNoUsers['kratopisanie'];
                                    }?></p>
                            </div>
                        <?php }?>
                    </section>
                </div>  
                </div>     
</div>
</body>
</html>
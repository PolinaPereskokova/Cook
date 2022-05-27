<?php 
require "vendor/connectdb.php";
$file_name = basename(__FILE__);
session_start();
$id = $_SESSION ['users']['id'];
?>
    <header> 
        <?php require_once 'vendor/header.php'?>
    </header>
    <div class="content">
      <?php if($_SESSION['users']){?>
            <form method="post" action="/staty.php">
                <input type="submit" name="submitButton" value="Добавить статью"/>
            </form>
        <?php }?>    
            <div class="content_left">
                <section class="retsepts__container">
                    <?php
                        $recsNoUsers = mysqli_query($link, "SELECT * FROM `stat`  ORDER BY id DESC");
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
        <div class="text"></div>
        <a href="stat1.html" style="display:block;position:fixed;
                /*положение кнопки*/
                bottom:30px;right:50px;
                 /*оформление кнопки*/
                width:64px;height:32px;padding:12px 10px 2px;font-size:16px;
                text-decoration: none;"> <b>Далее</b></a>
</body>
</html>
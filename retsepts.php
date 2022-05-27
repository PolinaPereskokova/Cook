<?php
    require_once('vendor/connectdb.php');
    session_start(); 
    $id = $_GET['id_categories'];


?>
        <header> 
            <?php require_once 'vendor/header.php'?>
        </header>

    <div class ="retsepty__page">

        <form action="retsepts.php" method="GET">
            <h3>Поиск</h3>
            <input type="text" value="<?= $_GET['searchIn'] ?>" name="searchIn">
            <input type="submit">
        </form>
        <?php 
            if(!isset($_GET['searchIn'])){
                $cat;
                if($id != 0){

                    $catNames = mysqli_query($link, "SELECT `name` FROM `categories` WHERE `id` = '$id'");
                    $catName = mysqli_fetch_assoc($catNames);
            ?>
            <h2 class="title"><?= $catName['name'] ?></h2>
            <div class="container">
                <section class="retsepts__container">
                    <?php
                        $recs = mysqli_query($link, "SELECT * FROM `recepts` 
                        WHERE `id_categories`='$id' AND `status` = 1 ORDER BY `view` LIMIT 10");
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
                                    echo substr("{$rec['description']}", 0, 250).'...';
                                }else{
                                    echo $rec['description'];
                                }?></p>
                        </div>
                    <?php }?>
                    
                </section>
            <?php 
                }else{
                    $categories = mysqli_query($link, "SELECT * FROM `categories`");
                    while($categorie = mysqli_fetch_assoc($categories)){ ?>
                    <h1>
                        Категория <?= $categorie['name'] ?>
                    </h1>
                    <section class="retsepts__container">
                        <?php
                            $recs = mysqli_query($link, "SELECT * FROM `recepts` 
                            WHERE `id_categories`='{$categorie['id']}' AND `status` = 1 ORDER BY `view` LIMIT 10");
                            while($rec = mysqli_fetch_assoc($recs)){
                                $cat = $rec['id_categories'];
                                ?>
                            <div class="retsepty__container">
                                <div class="retsepty__container_img">
                                    <img src="/assets/img/<?= $rec['img']?>" alt="">
                                </div>
                                <a href="/retsept.php?id_retsepty=<?php echo $rec['id']?>">
                                        <h5><?= $rec['name'];?></h5></a>
                                        <p>Описание: <br> <?php 
                                        if(strlen($rec['description']) > 300){
                                            echo substr("{$rec['description']}", 0, 250).'...';
                                        }else{
                                            echo $rec['description'];
                                        }?>
                                        </p>
                            </div>
                        <?php }?>
                    </section>
                    <a href="retsepts.php?id_categories=<?=  $cat?>" class="a_recOne">Посмотреть все рецепты</a>
                    <?php }
            }
        }else{?>
            <h2 class="title">Результат поиска</h2>
            <div class="container">
                <section class="retsepts__container">
                    <?php
                        $recs = mysqli_query($link, "SELECT * FROM `recepts` 
                        WHERE `status` = 1 AND `name` LIKE '%{$_GET['searchIn']}%' 
                        ORDER BY `view`");
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
                                    echo substr("{$rec['description']}", 0, 250).'...';
                                }else{
                                    echo $rec['description'];
                                }?></p>
                        </div>
                    <?php }?>
                    
                </section>
        <?php
        }
        ?>

    </div>

</body>
</html>
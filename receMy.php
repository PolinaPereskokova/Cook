<?php
require_once('vendor/connectdb.php');
$file_name = basename(__FILE__);
    session_start(); 
    
    if(!$_SESSION['users']){
        header('location: index.php');
    }
?> 
    <?php require_once 'vendor/header.php'?>

<div class="containers rece">
    <button class="addRece">
        Добавить рецепт
    </button>
    <section class="receptsArr">

    <div class="reeptsArr_row">
                    <div>
                        №
                    </div>
                    <div class="name">
                        Имя
                    </div>
                    <div class="categories">
                        Категория
                    </div>
                    <div class="descriptions">
                       Описание
                    </div>
                    <div class="ings">
                        Ингредиенты
                    </div>
                    <div class="steps">
                        Шаги
                    </div>
                    <div class="buttons">
                        Действия
                    </div>
                </div>





        <?php 
            $reces = mysqli_query($link, 
            "SELECT `recepts`.*, `categories`.*
                FROM `recepts` 
                    LEFT JOIN `categories` ON `recepts`.`id_categories` = `categories`.`id`
                    WHERE `recepts`.`id_users` = '{$_SESSION['users']['id']}'");
                $number = 1;
            while($rece = mysqli_fetch_row($reces)){
                ?>
                <div class="reeptsArr_row" data-img="<?= $rece['5']?>" data-id="<?= $rece[0]?>">
                    <div>
                        <?= $number?>
                    </div>
                    <div class="name"><?= $rece['3']?></div>
                    <div class="categories" data-id="<?= $rece['9']?>"><?= $rece['10']?></div>
                    <div class="descriptions"><?= $rece['4']?></div>
                    <div class="ings" data-id="<?= $rece[0]?>">
                        Ингредиенты
                    </div>
                    <div class="steps" data-id="<?= $rece[0]?>">
                        Шаги
                    </div>
                    <div class="buttons">
                        <button class="edit_rice" data-id="<?= $rece[0]?>">
                            Редактировать
                        </button>
                        <button class="op_rice" data-id="<?= $rece[0]?>">
                            <?php 
                                if($rece['8'] == 0){
                            ?>
                            Опубликовать
                            <?php }else{ ?>
                                Скрыть
                            <?php }?>
                        </button>
                        <button class="delete_rice" data-id="<?= $rece[0]?>">
                            Удалить
                        </button>
                    </div>
                </div>
                <?php
                $number++;
            }
        ?>
        
    </section>
</div>
<section class="modal_window">
    <div class="modal_window__body">
                
    </div>
</section>
</body>
<script src="/assets/js/jquery-3.6.0.min.js">
   
</script>
<script>
    let objCat = {};
    let arrCat = [];
    let objMas = {};
    let arrMas = [];
    <?php 
        $categories = mysqli_query($link,
         "SELECT * FROM `categories`");
        while($categorie = mysqli_fetch_assoc($categories)) {?>
            objCat = {
                'id': `<?= $categorie['id'] ?>`,
                'name': `<?= $categorie['name'] ?>`
        }
        arrCat.push(objCat);
        <?php }?>

    <?php 
        $mass = mysqli_query($link,
         "SELECT * FROM `mas`");
        while($mas = mysqli_fetch_assoc($mass)) {?>
            objMas = {
                'id': `<?= $mas['id'] ?>`,
                'name': `<?= $mas['name'] ?>`
            }
        arrMas.push(objMas);
        <?php }?>
</script>
<script src="/assets/js/recepts.js"></script>

</html>

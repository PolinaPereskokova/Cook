<?php
require_once('vendor/connectdb.php');
$file_name = basename(__FILE__);
    session_start(); 

?>  
<header> 
    <?php require_once 'vendor/header.php'?>
</header>
<div class="containers">
    <form action="vendor/createRece.php" method="post" class="upload-form" enctype="multipart/form-data">
        <label>Название блюда:</label>
        <input type="text" name="name" value="<?= $rec['name'] ?>" class="rec_name">
        <label>Изображение блюда:</label>
        <input type="file" name="file" multiple="multiple" accept=".txt,image/*">
        <label>Категории:</label>
        <select name="categories" value="" class="select-categories rec_categories">
                <?php $categories = mysqli_query($link, "SELECT * FROM `categories`");
                    while($categorie = mysqli_fetch_assoc($categories)) {?>
                    <option <?php if($categorie['id']==0){ echo 'selected';} ?> value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option> 
                <?php } ?>
        </select>
        <label>Описание:</label>
        <textarea name="descriptions" class="rec_description" id="" cols="30" rows="10" style="height:100px;">
            <?= $rec['description'] ?>
        </textarea>
        <fieldset >
            <input type="hidden" name="countMer" class="countRecept" value="1">
            <legend>Ингридиенты:</legend>
            <div class="arr_ing">
                <div class="ing_one_arr">
                    <div class="input-css first">
                        <label>Ингридиент:</label>
                        <input name="ingName1" type="text" value="" class="fform_input">
                    </div>
                    <div class="input-css">
                        <label>Количество:</label>
                        <input name="count1" class="count_ing" value="" type="number">
                    </div>
                    <div class="input-css">
                        <label>Мера веса/объёма</label>
                        <select name="mer1" class="select-count">
                        <?php 
                            $mers = mysqli_query($link, "SELECT * FROM `mas` WHERE 1");
                            $one = true;
                            while($mer = mysqli_fetch_assoc($mers)){
                                ?>
                                <option <?php if($one){ ?>selected<?php }?> value="<?= $mer['id']?>">
                                    <?= $mer['name']?>
                                </option>
                                
                                <?php $one = false;}?>
                        </select>
                    </div>
                </div>  
            </div>
            <input class="createIng" type="button" value="Добавить ингридиенты"> 
        </fieldset>
        <input type="hidden" name="countStep" class="countStep" value="1">
        <div class="form-steps">
                <fieldset><legend>Шаги изготовлние:</legend>
                    <div class="arr_step">
                        
                        <div class="step_one_arr">
                            <div class="input-css step_css_line">
                                <br>
                                <label>Шаг 1:</label>
                                <textarea class="rec_note" name="step1" id="" cols="30" rows="10" style="height:100px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <input class="createStep" type="button" value="Добавить шаг"> 
                </fieldset> 
            </div>
            <input class="createRece" disabled name="createRece" type="submit" value="Создать рецепт">
    </form>
</div>
</body>
<script src="/assets/js/jquery-3.6.0.min.js">

</script>
<script>
    let objMer = {
        
    };
    let arrIdMer = [];
    let arrNameMer = []; 
    <?php 
        $mers = mysqli_query($link, "SELECT * FROM `mas` WHERE 1");
        while($mer = mysqli_fetch_assoc($mers)){
            ?>
            arrIdMer.push(<?= $mer['id'] ?>);
            arrNameMer.push('<?= $mer['name'] ?>');
        <?php
        }
    ?>
    objMer = {
        'id': arrIdMer,
        'name': arrNameMer,
    }
    function createMer(){
        let html;
        objMer.id.forEach((element, key) => {
            if(key == 0){
                html += `<option selected value="${element}">
                        ${objMer.name[key]}
                </option>`;
            }else{
                html += `<option value="${element}">
                        ${objMer.name[key]}
                </option>`;
            }
            
        });
        return html;
    }
    var options = createMer();
</script>
<script src="/assets/js/createRece.js"></script>
</html>

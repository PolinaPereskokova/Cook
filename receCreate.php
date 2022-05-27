<?php
require_once('vendor/connectdb.php');
$file_name = basename(__FILE__);
    session_start(); 
    if(!$_SESSION['user']){
        header('location: index.php');
    }
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

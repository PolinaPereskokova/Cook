<?php
    require_once('vendor/connectdb.php');
    session_start(); 


    require 'vendor/parser/SimpleHtmlDom/simple_html_dom.php'; //подключаем библиотеку
    

    $id = $_GET['id_retsepty'];
    $recepty = mysqli_query($link, "SELECT * FROM `recepts` WHERE `id`='$id'");
    $recept = mysqli_fetch_assoc($recepty);
    if($recept['status'] == 0){
        header("Location: index.php");
    }

?>
    <?php require_once 'vendor/header.php'?>


        <div class="page">

        <?php 
        function parsePrice($product){
            $ruURL = rawurlencode($product);//пишем запрос по которому ищем товар
            $html = file_get_html( 'https://sbermegamarket.ru/catalog/?q='.$ruURL); // получаем страницу 
            $element = $html->find('.item-money');//получаем в массив все теги нужного нам класса 
        
        
            $priceSBER = 0;
            $countSBER = 0;
            foreach( $element as $index => $item ) {
                $priceStr = str_replace('₽', '', $item->children(0)->children(1)->plaintext); 
                $priceStr = str_replace(' ', '', $priceStr); 
                $priceSBER += $priceStr;
                $countSBER = $index;
                
                //запускаем цикл в котором проходим каждый элемент нашего массива, 
                // потом спускаемся в нужный дочерний тег и получаем цену товара
            }
            if(is_numeric($priceSBER) && $priceSBER!= 0){
                return $price = $priceSBER / $countSBER;
            }else{
                return "Товаров нет";
            }
            
        }
        ?>
                <h2 class="title-page"><?= $recept['name']?></h2>
            <div class="content_leftt">
                <div class="img-content">
                <img src = "assets/img/<?= $recept['img']?> ">
                </div>
                <div class="elements">
                   <h3> ИНГРЕДИЕНТЫ</h3>   
                   <div>
                        <ul>
                            <?php $ings = mysqli_query($link, "SELECT * FROM `ingredients` WHERE `id_recept`='{$recept['id']}'");
                                while($ing = mysqli_fetch_assoc($ings)){?>
                                <li><?php  echo $ing['name'].": ".$ing['count'];
                                    $mers = mysqli_query($link, "SELECT * FROM `mas` WHERE `id`='{$ing['id_mas']}'");
                                    $mer = mysqli_fetch_assoc($mers);
                                    echo $mer['name'];?> <br>Средняя цена на продукт: 
                                    <?php 
                                        $funRez = parsePrice($ing['name']);
                                        if(is_numeric($funRez)){
                                        echo round($funRez, 2)." ₽";
                                        }else{
                                            echo $funRez;
                                        }                                     
                                        ?>
                                </li>
                                <br>    
                            <?php }?>
                        </ul>
                   </div>
                </div>       
            </div>
        </div>

        <div class="recept">
            <p>Пошаговый рецепт</p>
            <div>
                <ol>
                    <?php $steps = mysqli_query($link, "SELECT * FROM `steps` WHERE `id_recept`='{$recept['id']}' ORDER BY `number`");
                        while($step = mysqli_fetch_assoc($steps)){?>
                        <li><?= $step['description']?>
                        </li>
                    <?php }?>
                </ol>
            </div>
        </div>
        <?= $recept['description']?> 
</body>
</html>
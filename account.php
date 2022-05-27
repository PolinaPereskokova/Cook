<?php
    require "vendor/connectdb.php";
    $file_name = basename(__FILE__);
    session_start();
    $id = $_SESSION ['users']['id'];
    $userquery = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'");
    $user = mysqli_fetch_assoc($userquery);
?>
 
        <header> 
            <?php require_once 'vendor/header.php'?>
        </header>

   <div class="containers">
   <h2>Личный кабинет</h2>
       <div class="avatarka__info">
            <span class="avatarka"><img src="assets/image/defualtavatar.jpg" style=" width: 200px; height: 300px;"></span>
            <div class="user__info">

                <form action="/vendor/update.php" method="post">
                    <label for="">Логин:<input class="string_info" name="name" type="text" value="<?= $user['nickname'] ?>" disabled></label>
                    <label for="">Email:<input class="string_info" name = "email" type="email" value="<?= $user['email'] ?>" disabled></label>
                    <label for="">Пароль:<input class="string_info" name="password" type="password" value="<?= $user['password']?>" disabled></label>
                    <button type="submit"  name="save"  id="save" hidden>Сохранить</button>
                </form>
                
                    <button type="submit"  name="close" id="close"  hidden>Отменить</button>   
                    <button type="submit"  name="eddit" id="eddit" >Редактировать</button>
            </div>
        </div>     
   </div>    
<script  src="assets/js/main.js"></script>
</body>
</html>
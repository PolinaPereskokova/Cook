<?php
require "vendor/connectdb.php";
$file_name = basename(__FILE__);
session_start();
?>
    
    <header>
        <?php require_once 'vendor/header.php'?>
    </header>
        <div class="login__form">
            <h2 class="title">Вопрос-ответ</h2>

            <h2 class="title-page">Здесь вы сможете получить ответ на любой вопрос</h2>
                <form action="vendor/formAction.php" method="POST">
                    <?php if(!$_SESSION['users']){?>
                        <input type="text" name = "nickname" class="feedback-input" required placeholder="Введите имя (ник)">

                        <input type="email" name = "email" class="feedback-input" required placeholder="Введите e-mail"><br>
                        
                    <?php }?>
                        <textarea name="commentText" class="feedback-input" required placeholder="Введите ваш вопрос:" rows="10" cols="45"></textarea><br>
                        <button type="submit" name="submit_reg" class="button-submite">Отправить</button>

                        <div class="easy"></div>
                </form>
        </div>   
</body>
</html>
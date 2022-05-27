<?php
    require "vendor/connectdb.php";
    $file_name = basename(__FILE__);
    session_start();
?>
            <header>
            <?php require_once 'vendor/header.php'?>
            </header>
<div class="containeri">
    <article class="registr">

                <div class="login__form">
                    <section class="block_item block-item">
                        <h2 class="block-item_title">У вас уже есть аккаунт?</h2>
                        <button class="block-item_btn signin-btn">Войти</button>
                    </section>
                    <section class="block_item block-item">
                        <h2 class="block-item_title">У вас нет аккаунта?</h2>
                        <button class="block-item_btn signup-btn">Зарегистрироваться</button>
                    </section>
                </div> 
                <div class="form-box">
                    <!-- Форма авторизации -->
                    <form action="vendor/LoginAction.php" class="form form_signin" method="POST">
                        <h3 class="form_title">Авторизация</h3>
                        <p><input type="text" name="nickname"  class="form_input" required placeholder="Введите логин или e-mail"></p>
                        <p><input type="password" name="password"  class="form_input" required placeholder="Введите пароль"></p>
                        <p><button type="submit" class="form_btn" name="submit_login">Войти</button></p>
                        <span><?
                        if($_SESSION['message']) {
                            echo $_SESSION['message'];
                            }
                        ?></span>        
                    </form>

                     <!-- Форма регистрации -->
                     <form action="vendor/LoginAction.php" class="form form_signup" method="POST">
                        <h3 class="form_title">Регистрация</h3>
                        <p><input type="text" name = "nickname" class="form_input" required placeholder="Имя для входа (логин)"></p>
                        <p><input type="email" name = "email" class="form_input" required placeholder="Введите e-mail"></p>
                        <p><input type="password" name = "password" class="form_input" required placeholder="Введите пароль"></p>
                        <p> <input type="password" name = "confirmpassword" class="form_input" required placeholder="Подтвердите пароль"></p>
                        <p><button type="submit" class="form_btn" name="submit_reg">Зарегистрироваться</button></p>
                        <span><?
                        if($_SESSION['message']) {
                            echo $_SESSION['message'];
                            }
                        ?></span>        
                    </form>
                </div> 

    </article> 
</div>          
</body>
</html>
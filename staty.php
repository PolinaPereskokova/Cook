<?php
  require_once('vendor/connectdb.php');
  session_start(); 
?>
        <header> 
            <?php require_once 'vendor/header.php'?>
        </header>

        <div class="containers">
            <form action="vendor/statAction.php" method="post" class="upload-form" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Название статьи" pattern="(^0-9\[A-Za-zА-Яа-яЁё\s]+$)">
                <textarea style="resize: none; width: 400px; height: 300px;" type="text" required name="kratopisanie"
                placeholder="Краткое описание" pattern="(^0-9\[A-Za-zА-Яа-яЁё\s]+$)"></textarea>
                <textarea style="resize: none; width: 400px; height: 300px;" type="text" required name="opisanie"
                placeholder="Полное описание" pattern="(^0-9\[A-Za-zА-Яа-яЁё\s]+$)"></textarea>
                <label> <input type="file" name="file" accept="image/*"></label>
                <input type="submit" name="stat">
            </form>
        </div>
</body>
</html>
<?php 
require "vendor/connectdb.php";
session_start();
$id = $_SESSION ['users']['id'];
?>

      <header> 
        <?php require_once 'vendor/header.php'?>
      </header>
     
        <div class="content">
          <div class="content_left">
                <?php 
                $recs = mysqli_query($link, "SELECT * FROM `stat` 
                WHERE `id_users`='$id'");
                while($rec = mysqli_fetch_assoc($recs)) {?>
                  <div class="retsepty__container">
                    <h3><a href="statz.php?id_stat=<?= $rec['id'] ?>"><?= $rec['name'] ?></a></h3> 
                    <img src = "assets/image/<?= $rec['avatarka']?>">
                    <p>Краткое описание<?= $rec['kratopisanie'];?></p>
                  </div>
                                        <?php } ?>
          </div>
        </div>
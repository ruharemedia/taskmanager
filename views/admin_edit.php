<?php
     session_start();
     if(empty($_SESSION['name'])){
        header('Location:../index.php');
    }
?>
<!DOCTYPE html>
<html lang="ru">

<!-- 
     Start 13:00 16.03.2020
     Ivan Zemzerov
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASK-MANAGER - Обновление</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

  <body>
      <div class="container margin-top-2">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Задачник</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="logout.php">Выйти (<?=$_SESSION['name'] ?>)</a></li>
                        <li><a href="#modalAdd" data-toggle="modal" data-target="#modalAdd">Добавить задачу +</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
       <?php foreach($task as $a): ?>
           <p><?=$a['name']?></p>
        <?php endforeach ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
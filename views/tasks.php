<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Задачник</title>
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/style.css" rel="stylesheet">
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
                        <li><a href="#modalAdd" data-toggle="modal" data-target="#modalAuth">Авторизация </a></li>
                        <li><a href="#modalAdd" data-toggle="modal" data-target="#modalAdd">Добавить задачу +</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Имя пользователя <a href="index.php?page=1&sort=name&type=asc">+</a> <a href="index.php?page=1&sort=name&type=desc">-</a></th>
                    <th>Email <a href="index.php?page=1&sort=email&type=asc">+</a> <a href="index.php?page=1&sort=email&type=desc">-</a></th>
                    <th>Текст задачи</th>
                    <th>Статус <a href="index.php?page=1&sort=status&type=desc">+</a> <a href="index.php?page=1&sort=status&type=asc">-</a></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach($articles as $a): ?>
                  <tr>
                  <td><?=$a['name'] ?></td> 
                  <td><?=$a['email'] ?></td>
                  <td><?=$a['textfield'] ?></td>
                  <td> <?=$a['status'] ?></td>
                  </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
               <?php foreach($pages_array as $b): ?>
                  <?= $b ?>
              <?php endforeach ?>
            </ul>
        </nav>
    </div>
    
        <div class="modal fade" id="modalAuth" tabindex="-1" role="dialog" aria-labelledby="modalAuth" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="admin/login.php" method="post">
                        <div class="form-group">
                            <label for="login">Логин:</label>
                            <input type="login" class="form-control" name="login" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить задачу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=add" method="post">
                        <div class="form-group">
                            <label for="email">Ваш Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Ваше имя:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                         <div class="form-group">
                            <label for="textfield">Текст задачи:</label>
                            <textarea name="textfield"  rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="views/js/bootstrap.min.js"></script>
  </body>
</html>
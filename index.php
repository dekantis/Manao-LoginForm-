<?php

if (!empty($_COOKIE['sid'])) {
    // Проверка id сессии в cookie
    session_id($_COOKIE['sid']);
}

session_start();
require_once 'classes/User.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Тест | Авторизация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Hello <?php echo $_SESSION["name"]; ?></h1>

      <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Выход</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Пожалуйста авторизуйтесь</h2>
        <input name="login" type="text" class="input-block-level" placeholder="Имя пользователя" autofocus>
        <input name="password" type="password" class="input-block-level" placeholder="Пароль">
        <label class="checkbox">
          <input name="remember-me" type="checkbox" value="remember-me" checked> Запомнить
        </label>
        <input type="hidden" name="act" value="login">
        <button class="btn btn-large btn-primary" type="submit">Вход</button>
    
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Все еще нет аккаунта?<a href="/register.php">Регистрация</a>
        </div>
      </form>
      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>

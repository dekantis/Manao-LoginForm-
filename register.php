<?php

if (!empty($_COOKIE['sid'])) {
    // Проверка id сессии в cookie
    session_id($_COOKIE['sid']);
}
session_start();
require_once './classes/User.class.php';

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Тест | Регистрация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>

  <body>

    <div class="container">

      <?php if (Auth\User::isAuthorized()): ?>
    
      <h1>Вы уже зарегистрированы</h1>

      <form class="ajax" method="post" action="./ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions">
              <button class="btn btn-large btn-primary" type="submit">Выход</button>
          </div>
      </form>

      <?php else: ?>

      <form class="form-signin ajax" method="post" action="./ajax.php">
        <div class="main-error alert alert-error hide"></div>

        <h2 class="form-signin-heading">Пожалуйста заргистрируйтесь</h2>
        <input name="login" type="text" class="input-block-level" placeholder="Придумайте логин" autofocus>
        <input name="password1" type="password" class="input-block-level" placeholder="Пароль">
        <input name="password2" type="password" class="input-block-level" placeholder="Подтвердите пароль">
        <input name="email" type="email" class="input-block-level" placeholder="Ваш email">
        <input name="username" type="text" class="input-block-level" placeholder="Ваше имя">
        <input type="hidden" name="act" value="register">
        <button class="btn btn-large btn-primary" type="submit">Регистрация</button>
        <div class="alert alert-info" style="margin-top:15px;">
            <p>Уже есть аккаунт? <a href="/">Вход</a>
        </div>
      </form>

      <?php endif; ?>

    </div> <!-- /container -->

    <script src="./vendor/jquery-2.0.3.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/ajax-form.js"></script>

  </body>
</html>

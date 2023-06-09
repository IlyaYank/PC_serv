<?php
error_reporting(-1);
session_start();

require_once __DIR__ . './components/funcs/db.php';
require_once __DIR__ . './components/funcs/login_and_registration.php';

if (!empty($_SESSION['user']['name'])){
    header("Location: ./components/lists/list_reg.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.min.css" />
    <title>Project_PS</title>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="header__nav">
          <div class="header__logo-img">
            <img class="header__logo" src="../img/logo1.svg" alt="" />
          </div>
          <div>
            <nav>
              <ul class="header__nav-list">
                <li class="header__nav-item">
                  <a href="../index.php" class="btn">Главная</a>
                </li>
                <li class="header__nav-item">
                  <a href="#" class="btn">О нас</a>
                </li>
                <li class="header__nav-item">
                  <a href="./components/registration_forms.php" class="btn"
                    >Регистрация</a
                  >
                </li>
                <li class="header__nav-item">
                  <a href="./components/login_form.php" class="btn">Вход</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="container"></div>
    </main>
  </body>
</html>

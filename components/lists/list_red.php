<?php
error_reporting(-1);
session_start();

require_once __DIR__ . '/../funcs/db.php';
require_once __DIR__ . '/../funcs/login_and_registration.php';

if (isset($_GET['do']) && $_GET['do'] = 'exit') {
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
        header("Location: ../login_form.php");
    }
    header("Location: ../login_form.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../css/style.min.css"/>
    <title>Регистрация заявки</title>
</head>

<body class="background-site">
<?php if (!empty($_SESSION['user']['name'])): ?>
    <header class="header-main__menu">
        <div class="container">
            <div class="header-main__menu-main">
                <div class="header-main__nav-logo">
                    <img src="../../img/logo1.svg" alt="icon" class="header__logo"/>
                </div>

                <div class="header-main__nav">
                    <nav>
                        <ul class="header-main__list">
                            <li class="header-main__item">
                                <a href="./list_reg.php" class="header-main__btn btn"
                                >Регистрация заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_active_applications.php"
                                        class="header-main__btn btn"
                                >Активные заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_completed_applications.php"
                                        class="header-main__btn btn"
                                >Выполненные заявки</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-main__info-accounts">
                    <div class="header-main__info-account">
                        <div class="header-main__img-avatar">
                            <img src="../../img/avatar.png" alt=""/>
                        </div>
                        <div class="header-main__info-user">
                            <p>Добро пожаловать: <?= htmlspecialchars($_SESSION['user']['name']) ?></p>
                            <p>Электронная почта: <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
                            
                        </div>
                    </div>

                    <div class="header-main__btn-exit">
                        <a href="?do=exit" class="btn">Выход</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <hr class="line_bk"/>
    <section class="form-list-application">
        <div class="container">
            <div class="container-list-application">
                <h1 class="form-list-application-title">Редактирование заявки</h1>
                <form action="#" method="post">
                    <div class="container-list-application-flex">
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Дата регистрации:
                            </h4>
                            <input class="input_form_list" type="date" value="2023-02-01"/>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Статус заявки:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Приняты"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Тип устройства:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Компьютер"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Модель устройства:
                            </h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Компьютер"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Имя клиента:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Иванов Иван Иванович"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Номер телефона:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="+(996)-000-000-000"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Мастер:</h4>
                            <input
                                    class="input_form_list"
                                    type="text"
                                    placeholder="Петров Петр Васильевич"
                            />
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Для мастера:</h4>
                            <p>
                  <textarea
                          class="input_form_list textarea_com"
                          name="comment"
                          placeholder="Введите ваш комментарий"
                  ></textarea>
                            </p>
                        </div>
                        <div class="input_form_list_submit_end">
                            <div class="checkbox_center">
                                <input type="checkbox" id="scales" name="scales"/>
                                <label class="checkbox_text_labal" for="scales"
                                >Принять заявку</label
                                >
                            </div>
                            <div class="list__red-div">
                                <div class="list__red btn ">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Редактировать"
                                    />
                                    <img src="../../img/icon-pencil.svg" alt="" class="img-icon"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php else:

    header("Location: ../login_form.php ");
    die();
    ?>

<?php endif; ?>
</body>
</html>

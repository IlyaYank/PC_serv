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
                                <a href="./list_reg.php" class="btn header-main__btn "
                                >Регистрация заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_active_applications.php"
                                        class="btn header-main__btn "
                                >Активные заявки</a
                                >
                            </li>
                            <li class="header-main__item">
                                <a
                                        href="./list_completed_applications.php"
                                        class="btn header-main__btn "
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
                <h1 class="form-list-application-title">
                    Лист заявки
                    <span class="form-list-application-title_span">№ 1</span>
                </h1>
                <form action="#" method="post">
                    <div class="container-list-application-flex">
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Дата регистрации:
                            </h4>
                            <p class="list_application_p">01.01.2023</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Статус заявки:</h4>
                            <p class="list_application_p">Принята</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Тип устройства:</h4>
                            <p class="list_application_p">Компьютер</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">
                                Модель устройства:
                            </h4>
                            <p class="list_application_p">Компьютер</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Имя клиента:</h4>
                            <p class="list_application_p">Иван Иванов Иванович</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Номер телефона:</h4>
                            <p class="list_application_p">+(996)-000-000-000</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Мастер:</h4>
                            <p class="list_application_p">Иванов Иван Иванович</p>
                        </div>
                        <div class="container-list-application-br">
                            <h4 class="container-list-application-text">Для мастера:</h4>
                            <p class="list_application_p list_application_p_com">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Ipsum voluptate earum quia explicabo repudiandae qui nostrum
                                voluptates ad officia? Consequatur aliquam distinctio
                                reprehenderit ab consectetur similique voluptas consequuntur
                                excepturi voluptatem.
                            </p>
                        </div>
                        <div class="input_form_list_submit_end_application_z">
                        <div class="list__z btn">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Изменить"
                                    />
                                    <img src="../../img/icon-pencil.svg" alt="" class="img-icon"/>
                                </div>
                            <div class="list__z btn">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Распечатать"
                                    />
                                    <img src="../../img/icon-printing.svg" alt="" class="img-icon"/>
                                </div>
                            <div class="list__z btn">
                                    <input
                                            class="list__red-input"
                                            type="submit"
                                            value="Связаться"
                                    />
                                    <img src="../../img/icon-call.svg" alt="" class="img-icon"/>
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

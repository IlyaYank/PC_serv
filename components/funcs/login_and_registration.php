<?php

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function registration(): bool
{
    global $pdo;

    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $name = !empty($_POST['name']) ? trim($_POST['name']) : '';
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';
    $role = !empty($_POST['role']) ? $_POST['role'] : '';

    /* Проверка на количество зарегестрированных пользователей */
    // $quant = $pdo->prepare('SELECT COUNT(*) FROM users');
    // $quant->execute();
    // $num = $quant->fetchColumn();
    // if($num > 3){
    //     $_SESSION['errors'] = 'Превышено количество зарегестрированных пользователей';
    //     return false;
    // }

    if (empty($email) && empty($name)) {
        $_SESSION['errors'] = "Заполните поле: Email/имя";
        return false;
    }
    if(empty($pass)) {
        $_SESSION['errors'] = 'Заполните поле: пароль';
        return false;
    }

    if(empty($role)){
        $_SESSION['errors'] = 'Выберите роль';
        return false;
    }
    $res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $res->execute([$email]);
    if ($res->fetchColumn()) {
        $_SESSION['errors'] = 'Данный логин используется';
        return false;
    }

    $pass = password_hash($pass, PASSWORD_DEFAULT);


    $res = $pdo->prepare("INSERT INTO users(email, `name`, `role_id`, pass) VALUES(?, ?, ?, ?)");
    if ($res->execute([$email, $name, $role, $pass])) {
        $_SESSION['success'] = 'Успешная регистрация';
        return true;
    } else {
        $_SESSION['errors'] = 'Оишибка регистрации';
        return false;
    }
}


function loginaout(): bool
{
    global $pdo;

    $email = !empty($_POST['email']) ? trim($_POST['email']) : ''; /// email
    $pass = !empty($_POST['pass']) ? trim($_POST['pass']) : '';

    if (empty($email) && empty($pass)) {
        $_SESSION['errors'] = 'Поля логин/пароль бязательны';
        return false;
    }


    $res = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $res->execute([$email]);
    if (!$user = $res->fetch()) {
        $_SESSION['errors'] = 'Логин или пароль введены неверно';
        return false;
    }


    if (!password_verify($pass, $user['pass'])) { //
        $_SESSION['errors'] = 'Логин или пароль введены неверно!';
        return false;
    } else {
        //Вот код который доюавляет переменую роли
        $Role = $pdo->prepare("SELECT role.role FROM `users` INNER JOIN `role` ON users.role_id = role.id WHERE users.email = ?");
        $Role->execute([$email]);
        $success_role = $Role->fetchColumn();
        $_SESSION['user']['role'] = $success_role;
       
        $_SESSION['success'] = 'Вы успешно авторизовались';
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['email'] = $user['email'];
       
        return true;
    }
}


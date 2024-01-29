<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>QW</title>
    <link href="/resource/styles/mystyle.css" rel="stylesheet">
    <link href="/resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <?php if ($valueForTemplate['render'] === 'log'): ?>
        <div class="col-md-6 col-md-offset-3 form_style"">
        <?php if (isset($valueForTemplate['error'])): ?>
        <div class="col-md-8 col-md-offset-2 text-center bg-success">
            <strong><?= $valueForTemplate['error']  ?></strong>
        </div>
        <?php endif; ?>
            <form action="/auth/user/log" method="post">
                <h4 class="text-center"><strong>Регистрация и авторизация пользователя</strong></h4>
                <div class="form-group color-background-head">
                    <lable >
                        <strong>Email address</strong>
                        <input type="email" name="email" class="form-control" placeholder="Введите адрес электронной почты" value="<?php if (!empty($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>"">
                    </lable>
                </div>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Password</strong>
                        <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                    </lable>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-default btn-block col-md-4">Войти</button>
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <a class="btn btn-link btn-block" href="/auth/user/reg"">Зарегестрироваться</a>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <?php if ($valueForTemplate['render'] === 'reg'): ?>
            <div class="col-md-6 col-md-offset-3 form_style">
                <?php if (!empty($valueForTemplate['error'])): ?>
                    <div class="col-md-8 col-md-offset-2 text-center bg-success">
                        <strong><?= $valueForTemplate['error']  ?></strong>
                    </div>
                <?php endif; ?>
                <form action="/auth/user/reg" method="post">
                    <h4 class="text-center">
                        <strong>Регистрация пользователя</strong>
                    </h4>
                    <div class="form-group color-background-head">
                        <lable >
                            <strong>Nickname</strong>
                            <input type="text" name="nickname" class="form-control" placeholder="Введите имя пользователя" value="<?php if (!empty($_POST['nickname'])) {
                                echo $_POST['nickname'];
                            } ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable >
                            <strong>Email address</strong>
                            <input type="email" name="email" class="form-control" placeholder="Введите адрес электронной почты" value="<?php if (!empty($_POST['email'])) {
                                echo $_POST['email'];
                            } ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Password</strong>
                            <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Confirm the password</strong>
                            <input type="password" name="confirm" class="form-control" placeholder="Подтвердите пароль">
                        </lable>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default btn-block col-md-4">Зарегестрироваться</button>
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            <a class="btn btn-default btn-block" href="/auth/user/log">Отмена</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

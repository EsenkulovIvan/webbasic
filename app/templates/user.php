
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
        <?php if ($valueForTemplate === 'log'): ?>
        <div class="col-md-6 col-md-offset-3"">
            <form action="" >
                <h4 class="text-center"><strong>Регистрация и авторизация пользователя</strong></h4>
                <div class="form-group color-background-head">
                    <lable >
                        <strong>Email address</strong>
                        <input type="email" name="login" class="form-control" placeholder="Введите адрес электронной почты">
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
                        <a class="btn btn-link btn-block" href="http://webbasic/auth/user/reg"">Зарегестрироваться</a>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <?php if ($valueForTemplate === 'reg'): ?>
            <div class="col-md-6 col-md-offset-3">
                <form action="">
                    <h4 class="text-center">
                        <strong>Регистрация пользователя</strong>
                    </h4>
                    <div class="form-group color-background-head">
                        <lable >
                            <strong>Nickname</strong>
                            <input type="text" name="userName" class="form-control" placeholder="Введите имя пользователя">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable >
                            <strong>Email address</strong>
                            <input type="email" name="login" class="form-control" placeholder="Введите адрес электронной почты">
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
                            <input type="сonfirmThePassword" name="password" class="form-control" placeholder="Подтвердите пароль">
                        </lable>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn btn-default btn-block col-md-4">Зарегестрироваться</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

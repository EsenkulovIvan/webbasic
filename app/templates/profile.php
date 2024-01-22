<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="/resource/styles/mystyle.css" rel="stylesheet">
    <link href="/resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php if ($valueForTemplate === 'questionnaire'): ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 color_style form_profile">
            <form action="">
                <h3 class="text-center">
                    <strong>Заполните свои персональные данные</strong>
                </h3>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Фамилия</strong>
                        <input type="text" name="surname" class="form-control" placeholder="Фамилия">
                    </lable>
                </div>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Имя</strong>
                        <input type="text" name="name" class="form-control" placeholder="Имя">
                    </lable>
                </div>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Кем работаете(работали)</strong>
                        <input type="text" name="jobTitle" class="form-control" placeholder="Должность">
                    </lable>
                </div>
                <div class="form-group">
                    <lable class="color-background-head btn-block">
                        <strong>Место работы</strong>
                        <input type="text" name="company" class="form-control" placeholder="Организация">
                    </lable>
                </div>
                <div class="form-group color-background-head">
                    <lable for="selectId">
                        <strong>Образование</strong>
                    </lable>
                    <select class="form-control" id="selectId" name="education">
                        <option>ИжГТУ имени М.Т. Калашникова</option>
                        <option>Удмуртский государственный университет</option>
                        <option>Удмуртский государственный аграрный университет</option>
                    </select>
                </div>
                <div class="radio">
                    <strong>Пол</strong>
                    <div class="col-md-offset-1">
                        <lable class="radio-inline">
                            <input type="radio" name="gender" value="Мужской">
                            Мужской
                        </lable>
                        <lable class="radio-inline">
                            <input type="radio" name="gender" value="Женский">
                            Женский
                        </lable>
                        <lable class="radio-inline">
                            <input type="radio" name="gender" value="Не определён">
                            Затрудняюсь ответить
                        </lable>
                    </div>
                </div>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Контактный телефон</strong>
                        <input type="text" name="phone" class="form-control" placeholder="Номер телефона">
                    </lable>
                </div>
                <div class="checkbox">
                    <strong>Состоите в браке</strong>
                    <div class="col-md-offset-1">
                        <lable class="checkbox-inline">
                            <input type="checkbox" name="marriage" value="Да">
                            Да
                        </lable>
                    </div>
                </div>
                <div class="form-group color-background-head">
                    <div class="form-group color-background-head">
                        <lable><strong>Кратко о себе</strong>
                            <textarea class="form-control" rows="4" style="resize: none" name="about" placeholder="Введите хоть что-нибудь..."></textarea>
                        </lable>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-default btn-block col-md-4">Сохранить</button>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <button type="reset" class="btn btn-default btn-block col-md-4">Сброс</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($valueForTemplate === 'list'): ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form_profile">
            <table class="table table-bordered table-hover">
                <h4 class="text-center"><strong>Список кандидатов</strong></h4>
                <tr>
                    <th>№</th>
                    <th>Имя пользователя</th>
                    <th>Почтовый ящик</th>
                    <th>Дата регистрации</th>
                </tr>
                <tr>
                    <td><?php 1 ?></td>
                    <td><?php $user['nickname'] ?></td>
                    <td><?php $user['email'] ?></td>
                    <td><?php $user['createdAt'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php endif ?>
</div>
</body>
</html>
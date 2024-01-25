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
    <?php if ($valueForTemplate['render'] === 'questionnaire'): ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 color_style form_profile">
            <form action="/content/profile/questionnaire" method="post">
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
                <div class="form-group color-background-head">
                    <input type="hidden" name="statusIsProfileSave" value="1" class="form-control">
                </div>
                <div class="checkbox">
                    <strong>Состоите в браке</strong>
                    <div class="col-md-offset-1">
                        <lable class="checkbox-inline">
                            <input type="hidden" name="marriage" value="Нет">
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
    <?php if ($valueForTemplate['render'] === 'list'): ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center bg-success">
            <strong><?= $valueForTemplate['success']  ?></strong>
        </div>
        <div class="col-md-10 col-md-offset-1 form_profile" style="background-color: #ffffff">
            <table class="table table-bordered table-hover">
                <h4 class="text-center"><strong>Список кандидатов</strong></h4>
                <tr>
                    <th>№</th>
                    <th>Имя пользователя</th>
                    <th>Почтовый ящик</th>
                    <th>Дата регистрации</th>
                </tr>
                <?php
                $count = 1;
                foreach ($objects as $object): ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <?php if ($object->getId() === $_SESSION['id']): ?>
                    <?php $currentId = $object->getId() ?>
                    <td style="color: red"><?= $currentUser = $object->getNickname() ?></td>
                    <?php else: ?>
                    <td><?= $object->getNickname() ?></td>
                    <?php endif; ?>
                    <td><?= $object->getEmail() ?></td>
                    <td><?= $object->getCreatedAt() ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <h5 class="text-center"><strong>Активный пользователь: <?= $currentUser ?></strong></h5>
        </div>
    </div>
        <div class="row form_profile">
            <div class="col-md-2 col-md-offset-2">
                <?php if (isset($_SESSION['isProfileSave']) && $_SESSION['isProfileSave'] == 1 && $currentId === $_SESSION['userId']): ?>
                <a class="btn btn-default btn-block" href="/content/workwithprofile/look">Посмотреть</a>
                <?php else: ?>
                <a class="btn btn-default btn-block" href="/content/profile/questionnaire">Заполнить</a>
                <?php endif; ?>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <?php if (isset($_SESSION['isProfileSave']) && $_SESSION['isProfileSave'] == 1 && $currentId === $_SESSION['userId']): ?>
                    <a class="btn btn-default btn-block" href="/content/workwithprofile/redactor">Редактировать</a>
                <?php else: ?>
                    <a class="btn btn-default btn-block disabled" href="/content/workwithprofile/redactor">Редактировать</a>
                <?php endif; ?>
            </div>
            <div class="col-md-2 col-md-offset-1 ">
                <?php if (isset($_SESSION['isProfileSave']) && $_SESSION['isProfileSave'] == 1 && $currentId === $_SESSION['userId']): ?>
                    <a class="btn btn-default btn-block"  href="/content/workwithprofile/delete">Удалить</a>
                <?php else: ?>
                    <a class="btn btn-default btn-block disabled" href="/content/workwithprofile/delete">Удалить</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-default btn-block" href="/content/user/out">Выйти</a>
            </div>
        </div>
    <?php endif ?>
</div>
</body>
</html>
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
    <?php if ($valueForTemplate['render'] === 'redactor'): ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 color_style form_profile">
                <?php if (isset($valueForTemplate['error'])): ?>
                    <div class="col-md-8 col-md-offset-2 text-center bg-success">
                        <strong><?= $valueForTemplate['error']  ?></strong>
                    </div>
                <?php endif; ?>
                <form action="/content/workwithprofile/redactor" method="post">
                    <h3 class="text-center">
                        <strong>Отредактировать данные</strong>
                    </h3>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Фамилия</strong>
                            <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="<?= $objects->getSurname() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Имя</strong>
                            <input type="text" name="name" class="form-control" placeholder="Имя" value="<?= $objects->getName() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Кем работаете(работали)</strong>
                            <input type="text" name="jobTitle" class="form-control" placeholder="Должность" value="<?= $objects->getJobTitle() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Место работы</strong>
                            <input type="text" name="company" class="form-control" placeholder="Наименование компании" value="<?= $objects->getCompany() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Образование</strong>
                            <input type="text" name="education" class="form-control" placeholder="Учебное заведение" value="<?= $objects->getEducation() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Пол</strong>
                            <input type="text" name="gender" class="form-control" placeholder="Пол" value="<?= $objects->getGender() ?>">
                        </lable>
                    </div>
                    <div class="form-group color-background-head">
                        <lable>
                            <strong>Контактный телефон</strong>
                            <input type="text" name="phone" class="form-control" placeholder="Номер телефона" value="<?= $objects->getPhone() ?>">
                        </lable>
                    </div>
                    <div class="checkbox">
                        <strong>Семейное положение</strong>
                        <div class="col-md-offset-1">
                            <lable class="checkbox-inline">
                                <input type="hidden" name="familyStatus[married]" value="Не женат(не замужем)">
                                <input type="checkbox" name="familyStatus[married]" value="Женат(замужем)">
                                Состоите в браке?
                            </lable>
                        </div>
                        <div class="col-md-offset-1">
                            <lable class="checkbox-inline">
                                <input type="hidden" name="familyStatus[haveChildren]" value="Детей нет">
                                <input type="checkbox" name="familyStatus[haveChildren]" value="Есть дети">
                                Есть дети?
                            </lable>
                        </div>
                        <div class="col-md-offset-1">
                            <lable class="checkbox-inline">
                                <input type="hidden" name="familyStatus[haveBrothersOrSisters]" value="Единственный ребенок в семье">
                                <input type="checkbox" name="familyStatus[haveBrothersOrSisters]" value="Есть братья и сестры">
                                Eсть родные братья или сестры?
                            </lable>
                        </div>
                    </div>
                    <div class="form-group color-background-head">
                        <div class="form-group color-background-head">
                            <lable><strong>Кратко о себе</strong>
                                <textarea class="form-control" rows="4" style="resize: none" name="about" placeholder="Введите хоть что-нибудь..."><?= $objects->getAboutMe() ?></textarea>
                            </lable>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-default btn-block col-md-4">Отредактировать</button>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <a class="btn btn-default btn-block" href="/content/profile/list">Отмена</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($valueForTemplate['render'] === 'look'): ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 form_profile" style="background-color: #ffffff">
                <table class="table table-bordered table-hover">
                    <h4 class="text-center"><strong>Профиль кандитата</strong></h4>
                    <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Место работы</th>
                        <th>Должность</th>
                        <th>Образование</th>
                        <th>Пол</th>
                        <th>Телефон</th>
                        <th>Семейное положение</th>
                        <th>Кратко о себе</th>
                    </tr>
                    <tr>
                        <td><?= $objects->getSurname() ?></td>
                        <td><?= $objects->getName() ?></td>
                        <td><?= $objects->getCompany() ?></td>
                        <td><?= $objects->getJobTitle() ?></td>
                        <td><?= $objects->getEducation() ?></td>
                        <td><?= $objects->getGender() ?></td>
                        <td><?= $objects->getPhone() ?></td>
                        <td>
                            <?php $count = 1; ?>
                            <?php foreach (explode('-', $objects->getFamilyStatus()) as $item): ?>
                                <?= $count++ . '. ' .$item . '<br>' ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?= $objects->getAboutMe() ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-default btn-block" href="/content/profile/list">Назад</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($valueForTemplate['render'] === 'delete'): ?>
    <div class="col-md-6 col-md-offset-3">
        <form action="/content/workwithprofile/delete" class="form_style" method="post">
            <h4 class="text-center">
                <strong>Введите пароль</strong>
            </h4>
            <div class="form-group color-background-head">
                <lable>
                    <strong>Password</strong>
                    <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                </lable>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-default btn-block col-md-4">Удалить аккаунт</button>
            </div>
            <div class="col-md-4 col-md-offset-2">
                <a class="btn btn-default btn-block" href="/content/profile/list">Отмена</a>
            </div>
        </form>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
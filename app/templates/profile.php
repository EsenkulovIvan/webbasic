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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" class="forma1">
                <h4 class="text-center">
                    <strong>Заполните свои персональные данные</strong>
                </h4>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Фамилия</strong>
                        <input type="text" name="surname" class="form-control" placeholder="Фамилия">
                    </lable>
                </div>
                <div class="form-group color-background-head">
                    <lable>
                        <strong>Имя</strong>
                        <input type="text" name="nameUser" class="form-control" placeholder="Имя">
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
                        <input type="text" name="work" class="form-control" placeholder="Организация">
                    </lable>
                    <p class="help-block">В случае отсутствия поставить прочерк</p>
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
                    <strong>Вредные привычки</strong>
                    <div class="col-md-offset-1">
                        <lable class="checkbox-inline">
                            <input type="checkbox" name="smoke" value="Курит">
                            Курите
                        </lable>
                        <lable class="checkbox-inline">
                            <input type="checkbox" name="alcohol" value="Употребляет">
                            Употребляете спиртное
                        </lable>
                        <lable class="checkbox-inline">
                            <input type="checkbox" name="obsceneLanguage" value="Непристойно выражается">
                            Нецензурная лексика
                        </lable>
                        <lable class="checkbox-inline">
                            <input type="checkbox" name="obsceneLanguage" value="Отсутствуют" checked>
                            Отсутствуют
                        </lable>
                    </div>
                </div>
                <div class="form-group color-background-head">
                    <div class="form-group color-background-head">
                        <lable><strong>Кратко о себе</strong>
                            <textarea class="form-control" rows="4" style="resize: none" name="about"></textarea>
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
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-hover">
                <h4 class="text-center"><strong>Список кандидатов</strong></h4>
                <tr>
                    <th>№</th>
                    <th>Имя пользователя</th>
                    <th>Почтовый ящик</th>
                    <th>Телефон</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
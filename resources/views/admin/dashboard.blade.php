<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/dashboard/createcat" method="post">
    @csrf
    <label for="categories">Категория: </label>
    <select name="categories" id="cat">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
    </select><br>
    <label for="title">Название: </label>
    <input type="text" name="title"><br>
    <label for="code">Код: </label>
    <input type="text" name="code"><br>
    <label for="specifications">Спецификации: </label>
    <input type="text" name="specifications"><br>
    <label for="manufacturer">Производитель: </label>
    <input type="text" name="manufacturer"><br>
    <label for="manufacturerimg">Картинка производителя: </label>
    <input type="file" name="manufacturerimg"><br>
    <label for="productimg">Картинка товара: </label>
    <input type="file" name="productimg"><br>
    <label for="itemsavailable">Количество: </label>
    <input type="text" name="itemsavailable"><br>
    <input type="submit" value="Подтвердить">
</form>
</body>
</html>
<?php
?>

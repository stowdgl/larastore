<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ URL::asset('css/bootstrap4.css')}}" rel="stylesheet"/>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6" style="border-right: 1px solid #a39d9d">
            <h3>
                Добавить товар
            </h3>
            <form role="form" action="/dashboard/createprod" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Категория: </label>
                    <select class="form-control" id="categories" name="categories" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                       Название
                    </label>
                    <input type="text" class="form-control" id="title" name="title" required/>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                        Код товара
                    </label>
                    <input type="text" class="form-control" id="code" name="code" required/>
                </div>
                <div class="form-group">

                    <label for="specifications">
                        Характеристики
                    </label>
                    <input type="text" class="form-control" id="specifications" name="specifications" required/>
                </div>
                <div class="form-group">

                    <label for="manufacturer">
                        Производитель
                    </label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required/>
                </div>
                <label for="validatedCustomFile1">Изображение производителя</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="validatedCustomFile1" name="manufacturerimg" required>
                    <label class="custom-file-label" for="validatedCustomFile1">Выбрать изображение производителя...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <label for="validatedCustomFile1">Изображение товара</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile2" name="productimg" required>
                    <label class="custom-file-label" for="validatedCustomFile2">Выбрать изображение товара...</label>
                    <div class="valid-feedback">Example invalid custom file feedback</div>
                </div>
                <div class="form-group">

                    <label for="itemsavailable">
                        Количество товара
                    </label>
                    <input type="text" class="form-control" id="itemsavailable" name="itemsavailable" required/>
                </div>
                <div class="form-group">

                    <label for="price">
                        Цена(без знака $)
                    </label>
                    <input type="text" class="form-control" id="price" name="price" required/>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
        <div class="col-md-6" >
            <h3>
                Добавить категорию
            </h3>
            <form role="form" action="/dashboard/createcat" method="post">
                @csrf
                <div class="form-group">

                    <label for="title">
                        Название
                    </label>
                    <input type="text" class="form-control" id="title" name="title" required/>
                </div>
                <div class="form-group">

                    <label for="code">
                        Родитель(опционально)
                    </label>
                    <input type="text" class="form-control" id="code" name="parent_id" />
                </div>

                <button type="submit" class="btn btn-primary">
                    Добавить
                </button>
            </form>
        </div>
    </div>
</div>
<br><br><br>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Категория</th>
        <th scope="col">Название</th>
        <th scope="col">Код</th>
        <th scope="col">Характеристики</th>
        <th scope="col">Производитель</th>
        <th scope="col">Изображение производителя</th>
        <th scope="col">Изображение товара</th>
        <th scope="col">Количество товара</th>
        <th scope="col">Цена</th>
        <th scope="col">Создано</th>
        <th scope="col">Редактировано</th>
        <th scope="col">Управление</th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
    <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->categories[0]->title}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->code}}</td>
        <td>{{$product->specifications}}</td>
        <td>{{$product->manufacturer}}</td>
        <td>{{$product->manufacturer_img}}</td>
        <td>{{$product->product_img}}</td>
        <td>{{$product->items_available}}</td>
        <td>{{'$'.@$product->prices[0]->price}}</td>
        <td>{{$product->created_at}}</td>
        <td>{{$product->updated_at}}</td>
        <td><a href="/dashboard/delete/{{$product->id}}" class="btn btn-danger">Удалить</a></td>
        <td><a href="/dashboard/modify/{{$product->id}}" class="btn btn-warning">Изменить</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
{{$products->links()}}
<script src="{{ URL::asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap4.js')}}"></script>
</body>
</html>
<?php
?>

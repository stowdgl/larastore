<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify</title>
    <link href="{{ URL::asset('css/bootstrap4.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>
                Изменить товар с ID <a href="/product/{{$req['id']}}">{{$req['id']}}</a>
            </h3>
            <form role="form" action="/dashboard/modify/proc" method="post">
                @csrf
                <input type="hidden" value="{{$req['id']}}" name="prodid">
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
                    <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}" required/>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">
                        Код товара
                    </label>
                    <input type="text" class="form-control" id="code" name="code" value="{{$product->code}}" required/>
                </div>
                <div class="form-group">

                    <label for="specifications">
                        Характеристики
                    </label>
                    <input type="text" class="form-control" id="specifications" name="specifications" value="{{$product->specifications}}" required/>
                </div>
                <div class="form-group">

                    <label for="manufacturer">
                        Производитель
                    </label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{$product->manufacturer}}" required/>
                </div>
                <label for="validatedCustomFile1">Изображение производителя</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="validatedCustomFile1" name="manufacturerimg" value="{{$product->manufacturer_img}}" onchange="$('#lbltext3').html(this.files[0].name)" required>
                    <label class="custom-file-label" for="validatedCustomFile1" id="lbltext3">Выбрать изображение
                        производителя...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

                <label for="validatedCustomFile1">Изображение товара</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile2" name="productimg" value="{{$product->product_img}}" onchange="$('#lbltext4').html(this.files[0].name)" required>
                    <label class="custom-file-label" for="validatedCustomFile2" id="lbltext4">Выбрать изображение товара...</label>
                    <div class="valid-feedback">Example invalid custom file feedback</div>
                </div>
                <div class="form-group">

                    <label for="itemsavailable">
                        Количество товара
                    </label>
                    <input type="text" class="form-control" id="itemsavailable" name="itemsavailable" value="{{$product->items_available}}" required/>
                </div>
                <div class="form-group">

                    <label for="price">
                        Цена(без знака $)
                    </label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$product->prices[0]->price}}" required/>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>

    </div>
</div>

<script src="{{ URL::asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap4.js')}}"></script>
</body>
</html>


@foreach($categories as $category)
    <li><a href="/category/{{$category->id}}"><span class="icon-chevron-right"></span>{{$category->title}}</a></li>
@endforeach
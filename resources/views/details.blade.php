@include('layouts.header')

<!--
Lower Header Section
-->

        <div class="span9">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li><a href="/products">Products</a> <span class="divider">/</span></li>
                <li class="active">Preview</li>
            </ul>
            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span5">
                        <div id="myCarousel" class="carousel slide cntr">
                            <div class="carousel-inner">
                                @foreach($products as $product)
                                <div class="item active">
                                    <a href="#"> <img src="{{URL::asset($product->product_img)}}" alt="" style="width:100%"></a>
                                </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                        </div>
                    </div>
                    <div class="span7">
                        <h3>{{$products[0]->title}}</h3>
                        <hr class="soft"/>

                        <form class="form-horizontal qtyFrm" action="/addtocart" method="post">
                            @csrf
                            <div class="control-group">
                                <label class="control-label"><span>@foreach($products[0]->prices as $product){{$product['price']}}@endforeach</span></label>
                                <div class="controls">
                                    <input type="number" class="span6" placeholder="Qty." min="1" max=@foreach($products as $product)"{{$product->items_available}}"@endforeach>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span>Color</span></label>
                                <div class="controls">
                                    <select class="span11">
                                        <option>Red</option>
                                        <option>Purple</option>
                                        <option>Pink</option>
                                        <option>Red</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span>Materials</span></label>
                                <div class="controls">
                                    <select class="span11">
                                        <option>Material 1</option>
                                        <option>Material 2</option>
                                        <option>Material 3</option>
                                        <option>Material 4</option>
                                    </select>
                                </div>
                            </div>
                            <h4>@foreach($products as $product) {{$product->items_available}} @endforeach items in stock</h4>
                            <p>Nowadays the lingerie industry is one of the most successful business spheres.
                                Nowadays the lingerie industry is one of ...
                            <p>
                                <input type="hidden" value="{{$product->id}}" name="id">
                                @foreach($products as $product)
                                    @if($product->items_available==0)
                                        <button type="submit" class="shopBtn" disabled="disabled" style="background-color:#a39d9d;"><span class=" icon-shopping-cart"></span> NOT AVAILABLE</button>
                                        @else
                                <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
                            @endif
                            @endforeach
                        </form>
                    </div>
                </div>
                <hr class="softn clr"/>


                <ul id="productDetail" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                    <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>
                    {{--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acceseries <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                            <li><a href="#cat2" data-toggle="tab">Category two</a></li>
                        </ul>
                    </li>--}}
                </ul>
                <div id="myTabContent" class="tab-content tabWrapper">
                    <div class="tab-pane fade active in" id="home">
                        <h4>Product Information</h4>
                        <table class="table table-striped">
                            <tbody>
                            @foreach($products as $product)
                            <tr class="techSpecRow"><td class="techSpecTD1">@foreach(json_decode($product->specifications) as $key=>$spec){{$key.': '.$spec}}<br>@endforeach</td></tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>

                    </div>
                    <div class="tab-pane fade" id="profile">

                        @foreach($relprod as $product)


                        <div class="row-fluid">

                            <div class="span2">
                                <a href="/product/{{$product->id}}"><img src="{{URL::asset($product->product_img)}}" alt=""></a>
                            </div>
                            <div class="span6">
                                <a href="/product/{{$product->id}}"><h5>{{$product->title }}</h5></a>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3>@foreach($product->prices as $price){{'$'.$price['price']}}@endforeach</h3>
                                    <br>
                                    <div class="btn-group">
                                        <form action="/addtocart">
                                            <input type="hidden" value="{{$product->id}}{{$product->items_available}}">
                                           @if($product->items_available==0) <button class="shopBtn" href="#" title="" style="background-color:#a39d9d;" disabled="disabled"> NOT AVAILABLE </button>@else<button type="submit" class="shopBtn" title="add to cart"><span class="icon-shopping-cart"></span> Add to cart</button> @endif
                                        </form>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soft">
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="cat1">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                        <br>
                        <br>
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/b.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/a.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>
                    </div>
                    <div class="tab-pane fade" id="cat2">

                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/d.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/d.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/d.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="{{URL::asset('img/d.jpg')}}" alt="">
                            </div>
                            <div class="span6">
                                <h5>Product Name </h5>
                                <p>
                                    Nowadays the lingerie industry is one of the most successful business spheres.
                                    We always stay in touch with the latest fashion tendencies -
                                    that is why our goods are so popular..
                                </p>
                            </div>
                            <div class="span4 alignR">
                                <form class="form-horizontal qtyFrm">
                                    <h3> $140.00</h3>
                                    <label class="checkbox">
                                        <input type="checkbox">  Adds product to compair
                                    </label><br>
                                    <div class="btn-group">
                                        <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                        <a href="product_details.html" class="shopBtn">VIEW</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="soften"/>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- Body wrapper -->
    <!--
    Clients
    -->
    <section class="our_client">
        <hr class="soften"/>
        <h4 class="title cntr"><span class="text">Manufactures</span></h4>
        <hr class="soften"/>
        <div class="row">
            <?php $i =0;
            $imgs = [];
            $manufacturer = [];
            ?>
            @foreach($prod as $product)
                <?php
                $imgs[] = $product->manufacturer_img;
                $manufacturer[] = $product->manufacturer;
                ?>
            @endforeach
            <?php
            $imgs = array_unique($imgs);
            $manufacturer = array_unique($manufacturer);
            ?>
            @foreach($imgs as $img)
                @if($i>6)
                    @break;
                @endif
                <div class="span2">
                    <form action="/product/{{lcfirst($manufacturer[$i])}}" method="post">
                        @csrf
                        <button type="submit" style="border:none;"><img alt="" src="{{ URL::asset($img)}}" style="width: 100%"></button>
                    </form>
                </div>
                <?php $i++;?>
            @endforeach
        </div>
    </section>

    <!--
    Footer
    -->
    <footer class="footer">
        <div class="row-fluid">
            <div class="span2">
                <h5>Your Account</h5>
                <a href="#">YOUR ACCOUNT</a><br>
                <a href="#">PERSONAL INFORMATION</a><br>
                <a href="#">ADDRESSES</a><br>
                <a href="#">DISCOUNT</a><br>
                <a href="#">ORDER HISTORY</a><br>
            </div>
            <div class="span2">
                <h5>Iinformation</h5>
                <a href="contact.html">CONTACT</a><br>
                <a href="#">SITEMAP</a><br>
                <a href="#">LEGAL NOTICE</a><br>
                <a href="#">TERMS AND CONDITIONS</a><br>
                <a href="#">ABOUT US</a><br>
            </div>
            <div class="span2">
                <h5>Our Offer</h5>
                <a href="#">NEW PRODUCTS</a> <br>
                <a href="#">TOP SELLERS</a><br>
                <a href="#">SPECIALS</a><br>
                <a href="#">MANUFACTURERS</a><br>
                <a href="#">SUPPLIERS</a> <br/>
            </div>
            <div class="span6">
                <h5>The standard chunk of Lorem</h5>
                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
                Malorum" by Cicero are also reproduced in their exact original form,
                accompanied by English versions from the 1914 translation by H. Rackham.
            </div>
        </div>
    </footer>
</div><!-- /container -->

@extends('layouts.footer')
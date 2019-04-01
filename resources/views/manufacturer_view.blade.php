@extends('layouts.header')

<!--
Lower Header Section
-->
<div class="container">
    <div id="gototop"> </div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="/"><span>Twitter Bootstrap ecommerce template</span>
                        <img src="{{URL::asset('img/logo-bootstrap-shoping-cart.png')}}" alt="Shop">
                    </a>
                </h1>
            </div>
            <div class="span4">

            </div>
            <div class="span4 alignR">
                <p><br> <strong> Support (24/7) :  +380992270031 </strong><br><br></p>
                <span class="btn btn-warning btn-mini">$</span>
                <span class="btn btn-mini">&pound;</span>
            </div>
        </div>
    </header>

    <!--
    Navigation Bar Section
    -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="/">Home	</a></li>
                        <li class=""><a href="/products">All products</a></li>
                        <li class=""><a href="https://sharij.net">Новости</a></li>
                    </ul>
                    <form action="/search" class="navbar-search pull-left" style="padding-top: 5px; margin-right: 10px;float: right;" method="get">
                        <input type="text" placeholder="Search" name="search" class="search-query span2">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
    <div class="row">
        <div id="sidebar" class="span3">
            <div class="well well-small">
                <ul class="nav nav-list">
                    @foreach($categories as $category)
                        <li><a href="/category/{{$category->id}}"><span class="icon-chevron-right"></span>{{$category->title}}</a></li>
                    @endforeach
                    <li style="border:0"> &nbsp;</li>
                    <li> <a class="totalInCart" href="/cart"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li>
                </ul>
            </div>

            <div class="well well-small alert alert-warning cntr">
                <h2>50% Discount</h2>
                <p>
                    only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
                </p>
            </div>
            <div class="well well-small" ><a href="#"><img src="{{URL::asset('img/paypal.jpg')}}" alt="payment method paypal"></a></div>

            <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
            <br>
            <br>
            <ul class="nav nav-list promowrapper">
                <?php $i=0;?>
                @foreach($prod as $product)
                    @if($product->items_available==0&&$i<5)
                        <li>
                            <div class="thumbnail">
                                <a class="zoomTool" href="/product/{{$product->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <img src="{{ URL::asset($product->product_img)}}" alt="{{$product->title}}">
                                <div class="caption">
                                    <h4>{{$product->title}}</h4>
                                    <h4><a class="defaultBtn" href="/product/{{$product->id}}">VIEW</a> <span class="pull-right">@foreach($product->prices as $price){{$price['price']}}@endforeach</span></h4>
                                </div>
                            </div>
                        </li>
                        <li style="border:0"> &nbsp;</li>
                        <?php $i++; ?>
                    @endif
                @endforeach
            </ul>

        </div>
        <div class="span9">
            <!--
            New Products
            -->
            <div class="well well-small">
                <h3>Our Products </h3>
                <?php $i = 0;?>

                <div class="row-fluid">
                    <ul class="thumbnails">
                @foreach($products as $product)
                <?php $i++?>



                        <li class="span4">
                            <div class="thumbnail">
                                <a href="/product/{{$product->id}}" class="overlay"></a>
                                <a class="zoomTool" href="/product/{{$product->id}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a href="/product/{{$product->id}}"><img src="{{URL::asset($product->product_img)}}" alt=""></a>
                                <div class="caption cntr">
                                    <p>{{$product->title}}</p>
                                    <p><strong> @foreach($product->prices as $price){{$price['price']}}@endforeach</strong></p>
                                    <h4>@if($product->items_available==0) <a class="shopBtn" href="#" title=""> NOT AVAILABLE </a>@else<a class="shopBtn" href="#" title="add to cart">Add to cart</a> @endif</h4>
                                    <div class="actionList">
                                    </div>
                                    <br class="clr">
                                </div>
                            </div>
                        </li>






              @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
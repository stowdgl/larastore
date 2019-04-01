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
                        <li class=""><a href="/">Home	</a></li>
                        <li class=""><a href="/products">All products</a></li>
                        <li class=""><a href="https://sharij.net">Новости</a></li>

                    </ul>
                    <form action="#" class="navbar-search pull-left" style="padding-top: 5px; margin-right: 10px;float: right;">
                        <input type="text" placeholder="Search" class="search-query span2">
                    </form>
                    <ul class="nav pull-right">

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li class="active">Check Out</li>
            </ul>
            <div class="well well-small">
                <h1>Check Out <small class="pull-right">@if($prodcount==1) {{$prodcount}} item @else {{$prodcount}} items @endif are in the cart </small></h1>
                <hr class="soften"/>

                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Product{{var_dump(@$del)}}</th>
                        <th>Description</th>
                        <th>Avail.</th>
                        <th>Unit price</th>
                        <th>Qty </th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $prod = [];?>
                    @foreach($products as $product)
                      <?php $prod[] = $product?>
                        @endforeach
                    <?php $prices = [];?>
                    @foreach($prod as $item)
                    @foreach($item as $i)
                        <?php $pr = 0;

                        ?>
                        @foreach($i->prices as $price)<?php  $pr=$price['price']; $prices[] = $price['price'];?> @endforeach
                    {{--{{var_dump($prod)}}--}}
                    <tr>
                        <td><img width="100" src="{{URL::asset($i->product_img)}}" alt=""></td>
                        <td>{{$i->title}}<br><br></td>
                        <td><span class="shopBtn" style="vertical-align: center;text-align: center"><span class="icon-ok"></span></span> </td>
                        <td>@foreach($i->prices as $price){{'$'.$price['price']}}@endforeach  </td>
                        <td>
                            <form action="/cart" method="post">
                                @csrf
                            <input class="span1" name="qty" style="width: 100px;" placeholder="1" id="appendedInputButtons" size="16" type="number" min="1" max="{{$i->items_available}}">
                            <input type="submit" class="shopBtn" value="Update">
                            </form>
                            <form action="/deletefromcart">
                                <input type="hidden" value="{{$i->id}}" name="delid">
                                <input type="submit" class="shopBtn" value="Delete">
                            </form>
                        </td>
                        <td>
                            @if(isset($_POST['qty']))
                                {{'$'.(intval($pr)*intval($_POST['qty']))}}
                                <?php unset($_POST['qty'])?>
                                @else
                                {{'$'.$pr}}
                                @endif
                        </td>
                    </tr>
@endforeach
                    @endforeach
                    <tr>
                        <td colspan="6" class="alignR">Total products:	</td>
                        <td> {{array_sum($prices)}}</td>
                    </tr>
                    </tbody>
                </table><br/>

                <table class="table table-bordered">
                    <tbody>
                    <tr><td>ESTIMATE YOUR SHIPPING & TAXES</td></tr>
                    <tr>
                        <td>
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputEmail">Country</label>
                                    <div class="controls">
                                        <input type="text" placeholder="Country">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="span2 control-label" for="inputPassword">Post Code/ Zipcode</label>
                                    <div class="controls">
                                        <input type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="shopBtn">Click to check the price</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a href="/products" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
                <a href="/login" class="shopBtn btn-large" style="margin-left: 600px;">Login</a>
                <a href="/checkout" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

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
            @foreach($products1 as $product)
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
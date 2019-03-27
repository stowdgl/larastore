
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
                        <img src="{{ URL::asset('img/logo-bootstrap-shoping-cart.png')}}" alt="bootstrap sexy shop">
                    </a>
                </h1>
            </div>
            <div class="span4">

            </div>
            <div class="span4 alignR">
                <p><br> <strong> Support (24/7) : <a href="tel:+380992270031">+380992270031</a></strong><br><br></p>

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
                        <li class=""><a href="list-view.html">List View</a></li>
                        <li class=""><a href="grid-view.html">Grid View</a></li>
                        <li class=""><a href="three-col.html">Three Column</a></li>
                        <li class=""><a href="four-col.html">Four Column</a></li>
                        <li class=""><a href="general.html">General Content</a></li>
                    </ul>
                    <form action="#" class="navbar-search pull-left" style="padding-top: 5px;">
                        <input type="text" placeholder="Search" class="search-query span2">
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
                    <li><a href="category/{{$category->id}}"><span class="icon-chevron-right"></span>{{$category->title}}</a></li>
                    @endforeach
                    <li style="border:0"> &nbsp;</li>
                    <li> <a class="totalInCart" href="cart.html"><strong>Total Amount  <span class="badge badge-warning pull-right" style="line-height:18px;">$448.42</span></strong></a></li>
                </ul>
            </div>

            <div class="well well-small alert alert-warning cntr">
                <h2>50% Discount</h2>
                <p>
                    only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
                </p>
            </div>
            <div class="well well-small" ><a href="#"><img src="{{ URL::asset('img/paypal.jpg')}}" alt="payment method paypal"></a></div>

            <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
            <br>
            <br>
            <ul class="nav nav-list promowrapper">
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <img src="{{ URL::asset('img/bootstrap-ecommerce-templates.png')}}" alt="bootstrap ecommerce templates">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="/details">VIEW</a> <span class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
                <li style="border:0"> &nbsp;</li>
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <img src="{{ URL::asset('img/shopping-cart-template.png')}}" alt="shopping cart template">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="/details">VIEW</a> <span class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
                <li style="border:0"> &nbsp;</li>
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <img src="{{ URL::asset('img/bootstrap-template.png')}}" alt="bootstrap template">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="/details">VIEW</a> <span class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <div class="span9">
            <div class="well np">
                <div id="myCarousel" class="carousel slide homCar">
                    <div class="carousel-inner">
                        <div class="item">
                            <img style="width:100%" src="{{ URL::asset('img/bootstrap_free-ecommerce.png')}}" alt="bootstrap ecommerce templates">
                            <div class="carousel-caption">
                                <h4>Bootstrap shopping cart</h4>
                                <p><span>Very clean simple to use</span></p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="width:100%" src="{{ URL::asset('img/carousel1.png')}}" alt="bootstrap ecommerce templates">
                            <div class="carousel-caption">
                                <h4>Bootstrap Ecommerce template</h4>
                                <p><span>Highly Google seo friendly</span></p>
                            </div>
                        </div>
                        <div class="item active">
                            <img style="width:100%" src="{{ URL::asset('img/carousel3.png')}}" alt="bootstrap ecommerce templates">
                            <div class="carousel-caption">
                                <h4>Twitter Bootstrap cart</h4>
                                <p><span>Very easy to integrate and expand.</span></p>
                            </div>
                        </div>
                        <div class="item">
                            <img style="width:100%" src="{{ URL::asset('img/bootstrap-templates.png')}}" alt="bootstrap templates">
                            <div class="carousel-caption">
                                <h4>Bootstrap templates integration</h4>
                                <p><span>Compitable to many more opensource cart</span></p>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            <!--
            New Products
            -->
            <div class="well well-small">
                <h3>New Products </h3>
                <hr class="soften"/>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        <?php $i = 0?>
                        @foreach($products as $product)
                                @if($i>3)
                                    @break
                                    {{$i++}}
                                @endif
                        <li class="span4">
                            <div class="thumbnail">

                                <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a href="/details"><img src="{{ URL::asset($product->product_img)}}" alt=""></a>
                                <div class="caption cntr">
                                    <p>{{$product->title}}</p>
                                    <p><strong> @foreach($product->prices as $price){{$price['price']}}@endforeach</strong></p>
                                    <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
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
            <!--
            Featured Products
            -->
            <div class="well well-small">
                <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Best Selling Products  </h3>
                <hr class="soften"/>
                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span4">
                            <div class="thumbnail">
                                <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a  href="/details"><img src="{{ URL::asset('img/d.jpg')}}" alt=""></a>
                                <div class="caption">
                                    <h5>Manicure & Pedicure</h5>
                                    <h4>
                                        <a class="defaultBtn" href="/details" title="Click to view"><span class="icon-zoom-in"></span></a>
                                        <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
                                        <span class="pull-right">$22.00</span>
                                    </h4>
                                </div>
                            </div>
                        </li>
                        <li class="span4">
                            <div class="thumbnail">
                                <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a  href="/details"><img src="{{ URL::asset('img/e.jpg')}}" alt=""></a>
                                <div class="caption">
                                    <h5>Manicure & Pedicure</h5>
                                    <h4>
                                        <a class="defaultBtn" href="/details" title="Click to view"><span class="icon-zoom-in"></span></a>
                                        <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
                                        <span class="pull-right">$22.00</span>
                                    </h4>
                                </div>
                            </div>
                        </li>
                        <li class="span4">
                            <div class="thumbnail">
                                <a class="zoomTool" href="/details" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                                <a  href="/details"><img src="{{ URL::asset('img/f.jpg')}}" alt=""/></a>
                                <div class="caption">
                                    <h5>Manicure & Pedicure</h5>
                                    <h4>
                                        <a class="defaultBtn" href="/details" title="Click to view"><span class="icon-zoom-in"></span></a>
                                        <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
                                        <span class="pull-right">$22.00</span>
                                    </h4>
                                </div>
                            </div>
                        </li>
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
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/1.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/2.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/3.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/4.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/5.png')}}"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="{{ URL::asset('img/6.png')}}"></a>
            </div>
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

<div class="copyright">
    <div class="container">
        <p class="pull-right">
            <a href="#"><img src="{{ URL::asset('img/maestro.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/mc.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/pp.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/visa.png')}}" alt="payment"></a>
            <a href="#"><img src="{{ URL::asset('img/disc.png')}}" alt="payment"></a>
        </p>
        <span>Copyright &copy; 2019<br> bootstrap ecommerce shopping template</span>
    </div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ URL::asset('js/jquery.js')}}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{ URL::asset('js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
<script src="{{ URL::asset('js/shop.js')}}"></script>
</body>
</html>
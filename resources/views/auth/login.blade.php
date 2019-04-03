


@include('layouts.header')
<!--
Lower Header Section
-->

        <div class="span9">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li class="active">{{ __('Login') }}</li>
            </ul>
            <h3> {{ __('Login') }}</h3>
            <hr class="soft"/>

            <div class="row" >
                <div class="span4">
                    <div class="well">
                        <h5>CREATE YOUR ACCOUNT</h5><br/>
                        <a href="/register">Create</a>
                    </div>
                </div>
                <div class="span1"> &nbsp;</div>
                <div class="span4">
                    <div class="well">
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif
                        <h5>ALREADY REGISTERED ?</h5>
                        <form action="{{route('doLogin')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input class="span3"  type="text" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" class="span3" placeholder="Password" name="pword">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <button type="submit" class="defaultBtn">Sign in</button>

                                </div>
                            </div>
                        </form>
                    </div>
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
        <span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
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

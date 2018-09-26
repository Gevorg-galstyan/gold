<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @section('head')
    <title>Jas Golds</title>
    <!--======= META =======-->
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--======= GOOGLE FONTS ========-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!--======= ICON ========-->
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
    <!--======= FONT AWESOME ========-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!--======= BOOTSTRAP ========-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"
          integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/et-line.css')}}"/>
    <!--======= TOP SLIDER =======-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/home-slider/style2.css')}}"/>
    <script type="text/javascript" src="{{asset('js/home-slider/modernizr.custom.28468.js')}}"></script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="{{asset('css/home-slider/nojs.css')}}"/>
    </noscript>
    <!--======= PRODUCT SLIDER =======-->
    <link rel="stylesheet" href="{{asset('css/home-product-slider/style.css')}}">
    <!--======= OWN CSS =======-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
</head>
<body>
<section class="preloader"></section>
<!-- =================== NAVIGATION ======================= -->

@include('frontend.layouts.nav-bar')

        @yield('content')

<!-- ===================== FOOTER ========================== -->

@include('frontend.layouts.footer')


@guest
    @include('frontend.layouts.loginModal')
@endguest

@section('script')


    <!--======= SCRIPTS =======-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>var token = $('meta[name="csrf-token"]').attr('content')</script>
    <!--======= MASONRY =======-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.2.0/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
            integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
            crossorigin="anonymous"></script>
    <!--======= TOP SLIDER =======-->
    <script type="text/javascript" src="{{asset('js/home-slider/jquery.cslider.js')}}"></script>
    <!--======= PRODUCT SLIDER =======-->
    <script src="{{asset('js/home-product-slider/mobile.js')}}"></script>
    <script src="{{asset('js/home-product-slider/main.js')}}"></script>

    <!--======= OWN JS =======-->
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
    <script>

        $('.load-cat').click(function () {
            var cats = [];
            $('.home-cat').each(function () {
                cats.push($(this).data('cat'))
            });
            var index = $('.home-cat:last').data('index');
            var url = $(this).data('href');
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token : token,
                    cats : cats,
                    index:index+1
                },
                beforeSend: function() {
                    $('.load-more-preloader').show();
                },
                complete: function(){
                    $('.load-more-preloader').hide();
                },
                success: function(response) {
                    if (response){
                        $('.home-cat:last').after(response);
                        $('html, body').animate({
                            scrollTop: $(".home-cat:last").offset().top
                        }, 1000);
                        $.getScript( "{{asset('js/home-product-slider/main.js')}}" );
                        $.getScript( "{{asset('js/home-product-slider/mobile.js')}}" );
                    }else{
                        $('.load-cat').fadeOut();
                    }
                }
            });

        })
    </script>



@show


</body>
</html>
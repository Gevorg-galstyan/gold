@extends('frontend.layouts.app')

@section('content')
    <!-- =================== SLIDER BANER ===================== -->
    <section id="section-slider">
        <div class="container-fluid">
            <!-- Codrops top bar -->

            <div id="da-slider" class="da-slider">
                <div class="da-slide">
                    <h2 class="font-trajan-bold slider-h1">Gold Earnings</h2>
                    <p class="slider-p">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <a href="#" class="da-link">see More</a>
                    <div class="da-img"><img src="{{asset('storage/img/home-slider/2.png')}}" alt="image01"/></div>
                </div>
                <div class="da-slide">
                    <h2 class="font-trajan-bold slider-h1">Revolution</h2>
                    <p class="slider-p">A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. It is a
                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <a href="#" class="da-link">see More</a>
                    <div class="da-img"><img src="{{asset('storage/img/home-slider/3.png')}}" alt="image01"/></div>
                </div>
                <div class="da-slide">
                    <h2 class="font-trajan-bold slider-h1">Warm welcome</h2>
                    <p class="slider-p">When she reached the first hills of the Italic Mountains, she had a last view back
                        on the skyline of
                        her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the
                        Line Lane.</p>
                    <a href="#" class="da-link">see More</a>
                    <div class="da-img"><img src="{{asset('storage/img/home-slider/1.png')}}" alt="image01"/></div>
                </div>
                <div class="da-slide">
                    <h2 class="font-trajan-bold slider-h1">Quality Control</h2>
                    <p class="slider-p">Even the all-powerful Pointing has no control about the blind texts it is an almost
                        unorthographic
                        life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the
                        far World of Grammar.</p>
                    <a href="#" class="da-link">see More</a>
                    <div class="da-img"><img src="{{asset('storage/img/home-slider/4.png')}}" alt="image01"/></div>
                </div>
                <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </nav>
            </div>
        </div>
    </section>
    <!-- =================== BODY CATEGORY ===================== -->
    <section id="section-category" class="mt-5">
        <div class="own-container">
            <div class="row">
                <div class="left-vertical font-trajan-bold">
                    <h1>Jas Golds</h1>
                </div>
                <div class="text-center w-100  mb-5 d-flex justify-content-center">
                    <div>
                        <h2 class="color-white font-trajan">Jas Collections</h2>
                        <hr class="border-line border-color  my-3"/>
                    </div>
                </div>


                <div class="no-touch w-100">
                @foreach($categories->shuffle()->splice(0, 4) as $i =>  $category)
                    @include('frontend.layouts.home-single-category',['spin' => false])
                @endforeach
                <div class="load-more-preloader mt-5">
                    <img src="{{asset('storage/img/preloader/load-more.gif')}}" alt="">
                </div>
                <!--==== LOAD MORE ====-->
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <button class="my-btn load-cat" data-href="{{route('get_cat')}}">Load More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                @foreach($categories as $category)
                    <a href="{{route('category', $category->slug)}}" class="my-btn">{{$category->translate()->name}}</a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- =================== MASONRY PRODUCTS ===================== -->
    <section id="masonry-products" class="mt-5 position-relative">
        <div class="right-vertical font-trajan-bold">
            <h2>Collections</h2>
        </div>
        <div class="container">

            <div>
                <div class="text-center w-100  mb-5 d-flex justify-content-center">
                    <div>
                        <h2 class="color-white font-trajan">Jas partners Collections</h2>
                        <hr class="border-line border-color  my-3"/>
                    </div>
                </div>
                <div class="site__wrapper">
                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href="https://maximumcode.net"><img src="{{asset('storage/img/home-masonry/2.png')}}" alt=""></a>
                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>
                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">Earnings</span></a>,
                                            <a href="#0"><span class="color">Gold</span></a>,
                                            <a href="#0"><span class="color">Rings</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/4.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/1.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/5.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/3.png')}}" alt=""></a>

                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/6.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/7.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/8.png')}}" alt=""></a>


                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid">
                        <div class="card">
                            <div class="card__image">
                                <a href=""><img src="{{asset('storage/img/home-masonry/9.png')}}" alt=""></a>
                                <div class="card__overlay-content">
                                    <a href="#0" class="card__title">How to create a card based article with HTML5 &amp;
                                        CSS3</a>

                                    <ul class="card__meta card__meta--last">
                                        <li><a href="#0"><span class="color-white">By</span> <span
                                                        class="color">Mithicher</span></a></li>
                                        <li>
                                            <i class="fa fa-tag font-13"></i>
                                            <a href="#0"><span class="color">UI/UX</span></a>,
                                            <a href="#0"><span class="color">UI/UX</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="grid">-->
                    <!--<div class="card">-->
                    <!--<div class="card__image">-->
                    <!--<img src="https://unsplash.it/400/300?image=177" alt="">-->

                    <!--<div class="card__overlay ">-->
                    <!--<div class="card__overlay-content">-->
                    <!--<a href="#0" class="card__title">How to create a card based article with HTML5 &amp; CSS3</a>-->

                    <!--<ul class="card__meta card__meta&#45;&#45;last">-->
                    <!--<li><a href="#0"><span class="color-white">By</span> <span class="color">Mithicher</span></a></li>-->
                    <!--<li><a href="#0"><i class="fa fa-tag"></i> <span class="color">UI/UX</span></a></li>-->
                    <!--</ul>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>

@endsection

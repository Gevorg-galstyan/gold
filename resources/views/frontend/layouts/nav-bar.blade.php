<header class="own-container">
    <div class="top-bar pt-2">
        <div class="d-flex align-items-center justify-content-between ">
            <div class="contacts">
                <div class="phone"><span class="color pr-1">Phone: </span> <span
                            class="color-white">+(374) 98 989791</span></div>
                <div class="e-mail"><span class="color pr-1">E-mail: </span> <span class="color-white">support@jasgolds.com</span>
                </div>
            </div>
            <ul class="soc d-flex align-items-center justify-content-between">
                <li>
                    <div class="dropdown">
                        <button class="btn bg-transparent dropdown-toggle color language-bar" type="button"
                                id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('storage/'.LaravelLocalization::getCurrentLocaleScript())}}" alt="{{LaravelLocalization::getCurrentLocaleName()}}" title="{{LaravelLocalization::getCurrentLocaleName()}}" class="pr-1"
                                 width="20px"/> <span
                                    class="mobile-off"> {{LaravelLocalization::getCurrentLocaleName()}} </span> <i
                                    class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu bg-dark-color language-dropdown border-color p-0"
                             aria-labelledby="languages">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item color language" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img src="{{asset('storage/'.$properties['script'])}}" class="pr-1"
                                            alt="{{ $properties['prefix'] }}" title="{{ $properties['prefix'] }}" width="20px"/>
                                    {{ $properties['prefix'] }}
                                </a>
                            @endforeach


                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="dropdown">
                        <button class="btn bg-transparent dropdown-toggle color language-bar" type="button"
                                id="currency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="pr-1 color-white   ">	&#36;</span> <span class="mobile-off">US Dollar</span>
                            <i
                                    class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu bg-dark-color language-dropdown border-color p-0"
                             aria-labelledby="currency">
                            <a class="dropdown-item color" href="#"><span class="pr-1 color-white">&#1423;</span>Arm
                                Dram</a>
                            <a class="dropdown-item color" href="#"><span class="pr-1 color-white">&#36;</span> US
                                Dollar </a>
                            <a class="dropdown-item color" href="#"><span class="pr-1 color-white">&#8381;</span> RU Rub</a>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="dropdown">
                        <button class="btn bg-transparent dropdown-toggle color language-bar" type="button" id="sine"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="pr-1 color-white   ">	<span class="et-icon icon-profile-male"></span></span>
                            <span class="mobile-off">My account</span> <i class="fas fa-angle-down"></i>
                        </button>
                        <div class="dropdown-menu bg-dark-color language-dropdown border-color p-0"
                             aria-labelledby="sine">

                            @guest
                                <a class="dropdown-item color" href="#" data-toggle="modal" data-target="#login">
                                    <span class="pr-1 color-white"></span>
                                    Login
                                </a>
                                <a class="dropdown-item color" href="#">
                                    <span class="pr-1 color-white"></span>
                                    Sine up
                                </a>
                            @else
                                <a class="dropdown-item color" href="{{route('user.dashboard')}}" >
                                    <span class="pr-1 color-white"></span>
                                    Dashboard
                                </a>
                                <a class="dropdown-item color" href="{{route('voyager.logout')}}">
                                    <span class="pr-1 color-white"></span>
                                    Log Out
                                </a>
                            @endguest
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li class="nav-item"><a class="nav-link " href="#"><span
                                class="et-icon icon-heart position-relative d-inline-block"><span
                                    class="wish-count">0</span></span></a></li>
                <li class="divider"></li>
                <li class="nav-item"><a class="nav-link search-btn" href="#"><span
                                class="et-icon  icon-magnifying-glass"></span></a></li>
                <li class="search-form">
                    <form action="/sdad" method="get">
                        <input type="search" name="search" placeholder="Search"/>
                        <button class="btn-search" type="submit" name="search">
                            <span class="et-icon  icon-magnifying-glass"></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <hr class="border-line border-color  my-3"/>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
        <a class="navbar-brand" href="{{route('home')}}"><img src="<?= asset('storage/img/logo.png'); ?>" alt="Jas Golds"
                                              width="60%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="header-menu">
            <ul class="navbar-nav ml-auto header-menu">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="underline"></span> </a>
                </li>

                <li class="nav-item dropdown megamenu-li ">
                    <a class="nav-link dropdown-toggle" href="" id="collection" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Collections <i class="fas fa-angle-down"></i> <span
                                class="underline"></span> </a>
                    <div class="dropdown-menu megamenu" aria-labelledby="collection">
                        <div class="row">
                            <div class="col-sm-6 col-lg-2 ">
                                <h5 class="mega-head">Products</h5>
                                <a class="dropdown-item" href="#">Necklaces</a>
                                <a class="dropdown-item" href="#">Bracelets</a>
                                <a class="dropdown-item" href="#">Sets</a>
                                <a class="dropdown-item" href="#">Pendants</a>
                                <a class="dropdown-item" href="#">Earnings</a>
                                <a class="dropdown-item" href="#">Rings</a>
                                <a class="dropdown-item" href="#">Brooches</a>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <h5 class="mega-head">Legal</h5>
                                <a class="dropdown-item" href="#">Terms Of Use</a>
                                <a class="dropdown-item" href="#">Terms & Conditions</a>
                                <a class="dropdown-item" href="#">Privacy</a>
                                <a class="dropdown-item" href="#">Cookie Consent</a>
                                <a class="dropdown-item" href="#">Payment Method</a>
                                <a class="dropdown-item" href="#">Delivery</a>
                            </div>
                            <div class="col-sm-12 col-lg-4 mt-lg-0 mt-3">
                                <h5 class="mega-head">About JAS</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus in
                                    veritatis, facilis eligendi sunt, culpa autem harum porro earum.</p>
                            </div>
                            <div class="col-sm-6 col-lg-4 mt-md-0 mt-3 d-none d-lg-block">
                                <!--<h5 class="mega-head">Image</h5>-->
                                <a href=""><img src="https://source.unsplash.com/250x150/?sig=4" alt="..."
                                                style="width: 100%;"></a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Partners <span class="underline"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About us <span class="underline"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacts <span class="underline"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
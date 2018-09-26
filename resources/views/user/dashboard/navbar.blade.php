<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
                <ol class="breadcrumb hidden-xs">
                    @if(Request::url() == route('user.dashboard'))
                        <li class="active"><i class="fas fa-tachometer-alt"></i> {{ __('generic.dashboard') }}
                        </li>
                    @else
                        <li class="active">
                            <a href="{{ route('user.dashboard')}}"><i
                                        class="fas fa-tachometer-alt"></i> {{ __('generic.dashboard') }}</a>
                        </li>
                    @endif
                    <?php $breadcrumb_url = url(''); ?>
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        <?php $breadcrumb_url .= '/' . Request::segment($i); ?>

                        @if(Request::segment($i) != ltrim(route('user.dashboard', [], false), '/') &&
                        !is_numeric(Request::segment($i)) &&
                        !in_array(Request::segment($i),config('voyager.multilingual.locales')) && Request::segment($i) != 'account')


                            <li>{{ ucwords( __('generic.'.str_replace('-', ' ', str_replace('_', ' ', Request::segment($i))))) }}</li>

                        @endif
                    @endfor
                </ol>

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><img id="imgNavSel" src="{{asset('storage/'.LaravelLocalization::getCurrentLocaleScript())}}" alt="..." class="img-thumbnail icon-small">  <span
                                    id="lanNavSel">{{LaravelLocalization::getCurrentLocaleName()}}</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a id="navIta" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="language">
                                        <img id="imgNavIta" src="{{asset('storage/'.$properties['script'])}}" alt="..." class="img-thumbnail icon-small"><span id="lanNavIta">{{ $properties['name'] }}</span></a>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                </ul>
            @show
        </div>
        <ul class="nav navbar-nav  navbar-right">
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                   aria-expanded="false">
                    <img src="{{ $user_avatar }}" class="profile-img">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>
                    <li class="divider"></li>

                    <?php $nav_items = config('voyager.user-dashboard.navbar_items'); ?>
                    @if(is_array($nav_items) && !empty($nav_items))
                        @foreach($nav_items as $name => $item)
                            <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="'.$item['classes'].'"' : '' !!}>
                                @if(isset($item['route']) && $item['route'] == 'voyager.logout')
                                    <form action="{{ route('voyager.logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-block">
                                            @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                                <i class="{!! $item['icon_class'] !!}"></i>
                                            @endif
                                            {{$name}}
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}" {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                                        @if(isset($item['icon_class']) && !empty($item['icon_class']))
                                            <i class="{!! $item['icon_class'] !!}"></i>
                                        @endif
                                        {{$name}}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>

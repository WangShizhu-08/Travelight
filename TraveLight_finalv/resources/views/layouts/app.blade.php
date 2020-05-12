<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">

    <!-- Jquery -->
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>

    <!-- datepicker -->
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript" src="{{ asset('js/updatecomment.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class=" container-fluid">
                <a class="navbar-brand d-flex" href="{{ route('ideas.index')}}">
                    <div><img src="/images/travelight_logo.png" style="height: 30px;" class="pr-1"></div>
                    <div class=" pl-1 pt-1 pr-3"> TraveLight </div>
                </a>
                <button id="search_btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                    <!-- search box -->
                    <form class="form-inline my-2 my-lg-0 offset-3" action="{{route('search')}}" method="get">
                        <!-- search catalog -->
                            <select name="search_cata" id="search_cata" >
                            <option value="tag">tag</option>
                            <option value="destination">destination</option>
                            </select>

                        <!-- search keywords -->
                            <label type="hidden" for="search_kw"></label>
                            <input class="form-control mr-sm-2" 
                                    name="search_kw" id="search_kw" type="text" 
                                    placeholder="Search" aria-label="Search">

                        <!-- partial search -->
                            <input type="checkbox" name="search_par" id="search_par">
                            <label class=" pl-2 pr-2" for="search_par">partial search</label>
                        
                            <button class="btn btn-primary" type="submit">Search</button>
                    </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item pr-2" style=" border-right: 1px solid #333;">
                                <a class="nav-link" href="{{ route('profile.index')}}">
                                    Hello, {{ Auth::user()->username }}
                                </a>
                            </li>

                            <li class="nav-item pl-2">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            <div class="bg"></div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>


        <script>
        var dateFormat = "mm/dd/yy",
        from = $( "#from" )
                .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
                })
                .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
                }),
        to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
        })
        .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
        });
        function getDate( element ) {
        var date;
        try {
                date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
                date = null;
        }
        return date;
        }
        </script>
    </div>
</body>

<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12">
            <h6>About</h6>
            <p class="text-justify">Travelight <i>Sharing Travel Ideas together </i> is an website for a group of friends to share travel ideas and to make comments </p >
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Group P ICOM6034 The University of Hong Kong
            </p >
        </div>
        </div>
    </div>
</footer>
</html>



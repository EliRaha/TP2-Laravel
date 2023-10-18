<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
     <!--CDN mdbootstrap-->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet"> -->
    </head>

<body>

    @php $locale = session()->get('locale'); @endphp
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div style="text-align: center;">
                <h5>TP2</h5>
            </div>
            <a class="navbar-brand" href="#">
            @lang('lang.text_hello') @if(Auth::check()) {{Auth::user()->name}} @else Guest @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <a class="nav-link font-weight-bold text-black" href="{{route('registration')}}">@lang('lang.text_registration')</a>
                        <a class="nav-link font-weight-bold text-black" href="{{route('login')}}">@lang('lang.text_login')</a>
                    @else
                        <!-- <a class="nav-link font-weight-bold text-black" href="{{route('etudiant.index')}}">User List</a> -->
                    
                        <a class="nav-link font-weight-bold text-black" href="{{route('article.index')}}">Article</a>
                        <a class="nav-link font-weight-bold text-black" href="{{route('document.index')}}">Document</a>
                        <a class="nav-link font-weight-bold text-black" href="{{route('logout')}}">@lang('lang.text_logout')</a>

                       
                       
                    @endguest
                    <a class="nav-link font-weight-bold text-black" href="{{route('lang', 'en')}}">En</a>
                    <a class="nav-link font-weight-bold text-black" href="{{route('lang', 'fr')}}">Fr</a>
                </ul>
            </div>
        </nav>
        <div class="col-12 text-center">
            <h3 class="display-5 mt-5">
                <!-- {{ config('app.name') }} -->
                @yield('titleHeader')
            </h3>
        </div>
        @yield('content')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>
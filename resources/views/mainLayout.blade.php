<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        .auth-labels {
            display: inline-block;
            width: 8em;
        }

        .auth-textbox {
            /* display: inline-block; */
            margin-bottom: .5em;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-end">
                <div class="fs-6">
                    @if(Auth::check())
                    {{ Auth::user()->userInfo->user_firstname.' '.Auth::user()->userInfo->user_lastname }}
                    <span class="fs-6" style="font-weight: bold;">
                        @if(Auth::user()->hasRole('admin'))
                        : Admin User
                        @else
                        : User
                        @endif
                    </span>
                    @include('slugs.logout')
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if(!Auth::check())
                @yield('auth-content')
                @else
                @yield('page-content')
                @endif
            </div>
        </div>
    </div>


</body>

</html>
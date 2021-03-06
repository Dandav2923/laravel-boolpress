<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
        {{-- header --}}
        @include('partials.header')
        {{-- main --}}
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="position-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('adminboolpresses.create') }}">
                                        Add Post
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('adminhome') }}">
                                        <i class="bi bi-house"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" 
                                    href="{{ route('admincategories.index') }}">
                                        <i class="bi bi-files"></i>
                                        All Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('adminboolpresses.index') }}">
                                        <i class="bi bi-files"></i>
                                        All Posts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" 
                                    href="{{ route('adminposts.indexUser') }}">
                                        <i class="bi bi-files"></i>
                                        My Posts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
                
            </main>
    </body>
</html>
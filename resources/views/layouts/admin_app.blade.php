<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VGLTU ASIAN STUDENT</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
                    VGLTU ASIAN STUDENT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/users/search') }}">Search User</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="studentsByNationalityDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Country
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="studentsByNationalityDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Bangladesh']) }}">Bangladeshi</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'India']) }}">Indian</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Nepal']) }}">Nepali</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="studentsByReligionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Religion
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="studentsByReligionDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Muslim']) }}">Muslim</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Hindu']) }}">Hindu</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Boddho']) }}">Boddho</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Christian']) }}">Christian</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="studentsByDepartmentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Department
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="studentsByDepartmentDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Language']) }}">Language</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Automobile']) }}">Automobile</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Forestry']) }}">Forestry</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Mechanical']) }}">Mechanical</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Computer Science and Technology']) }}">Computer Science and Technology</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Economics']) }}">Economics</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="studentsByCourseDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Course
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="studentsByCourseDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'Language']) }}">Language</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'BSC']) }}">BSC</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'MSC']) }}">MSC</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'PHD']) }}">PHD</a></li>
                            </ul>
                        </li>
                    

                    <!-- Right Side Of Navbar -->
                    
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endauth
                    </ul>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

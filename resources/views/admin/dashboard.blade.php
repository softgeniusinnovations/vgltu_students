@extends('layouts.admin_app')

@section('content')
<style>
        /* Sidebar styles */
        .sidebar {
            background-color: white;
            height: 100vh;
            padding: 10px;
            border-right: 1px solid #ccc;
        }
        .sidebar h4 {
            color: #444;
            padding: 10px 0;
        }
        .nav-item {
            padding: 5px 0;
        }
        .nav-link {
            color: #444;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .nav-link:hover {
            background-color: #444;
            color: white;
        }
        /* Dropdown styles */
        .dropdown-menu {
            display: none;
            list-style-type: none;
            padding-left: 15px;
            margin-top: 5px;
        }
        /* Card styles for boxes */
        .card {
            margin-bottom: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.15rem 0.75rem rgba(0, 0, 0, 0.1);
        }
        .card-body h5 {
            font-weight: bold;
            font-size: 1.1rem;
        }
        .card-body p {
            font-size: 1.3rem;
            color: #333;
        }

        /* Media Queries for responsiveness */
        /* Hide sidebar by default on mobile (max-width: 768px) */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
                height: auto;
            }
            /* Show the toggle button for mobile */
            .menu-toggle {
                display: block;
                background-color: #444;
                color: white;
                padding: 10px;
                text-align: center;
                cursor: pointer;
            }
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
        <h4>Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.list', ['category' => 'total']) }}">Total Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleMenu('nationality-menu')">Students by Nationality</a>
                <ul class="dropdown-menu" id="nationality-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Bangladesh']) }}">Bangladeshi</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'India']) }}">Indian</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Nepal']) }}">Nepali</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleMenu('religion-menu')">Students by Religion</a>
                <ul class="dropdown-menu" id="religion-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Muslim']) }}">Muslim</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Hindu']) }}">Hindu</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Boddho']) }}">Boddho</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Christian']) }}">Christian</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleMenu('department-menu')">Students by Department</a>
                <ul class="dropdown-menu" id="department-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Language']) }}">Language</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Automobile']) }}">Automobile</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Forestry']) }}">Forestry</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Mechanical']) }}">Mechanical</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Computer Science and Technology']) }}">Computer Science and Technology</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Economics']) }}">Economics</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleMenu('course-menu')">Students by Course</a>
                <ul class="dropdown-menu" id="course-menu">
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'Language']) }}">Language</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'BSC']) }}">BSC</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'MSC']) }}">MSC</a></li>
                    <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'PHD']) }}">PHD</a></li>
                </ul>
            </li>
        </ul>
    </div>

        <!-- Right side container -->
        <div class="col-md-10">
            <!-- Main content -->
        <div class="col-md-10 content">
            <div class="row">
                <!-- Row 1: Total Students by Nationality -->
                 <h2>Students By Country</h2>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'total']) }}" class="card">
                        <div class="card-body">
                            <h5>Total Students</h5>
                            <p>{{ $totalStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Bangladesh']) }}" class="card">
                        <div class="card-body">
                            <h5>Bangladesh</h5>
                            <p>{{ $totalBangladeshiStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'India']) }}" class="card">
                        <div class="card-body">
                            <h5>India</h5>
                            <p>{{ $totalIndianStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'country', 'value' => 'Nepal']) }}" class="card">
                        <div class="card-body">
                            <h5>Nepal</h5>
                            <p>{{ $totalNepaliStudents }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Row 2: Students by Religion -->
            <h2>Students By Religion</h2>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Muslim']) }}" class="card">
                        <div class="card-body">
                            <h5>Muslim</h5>
                            <p>{{ $muslimStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Hindu']) }}" class="card">
                        <div class="card-body">
                            <h5>Hindu</h5>
                            <p>{{ $hinduStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Boddho']) }}" class="card">
                        <div class="card-body">
                            <h5>Boddho</h5>
                            <p>{{ $boddhoStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Cristan']) }}" class="card">
                        <div class="card-body">
                            <h5>Christian</h5>
                            <p>{{ $cristanStudents }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Row 3: Students by Department -->
            <h2>Students By Department</h2>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Prepetory Language Course']) }}" class="card">
                        <div class="card-body">
                            <h5>Language</h5>
                            <p>{{ $languageStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Automobile']) }}" class="card">
                        <div class="card-body">
                            <h5>Automobile</h5>
                            <p>{{ $automobileStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Forestry']) }}" class="card">
                        <div class="card-body">
                            <h5>Forestry</h5>
                            <p>{{ $forestryStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Mechanical']) }}" class="card">
                        <div class="card-body">
                            <h5>Mechanical</h5>
                            <p>{{ $mechanicalStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Computer Science and Technology']) }}" class="card">
                        <div class="card-body">
                            <h5>CSE - (IT)</h5>
                            <p>{{ $cstStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Economics']) }}" class="card">
                        <div class="card-body">
                            <h5>Economics</h5>
                            <p>{{ $economicsStudents }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Row 4: Students by Course -->
            <h2>Students By Course Type</h2>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'Language']) }}" class="card">
                        <div class="card-body">
                            <h5>Language</h5>
                            <p>{{ $languageStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'BSC']) }}" class="card">
                        <div class="card-body">
                            <h5>BSC</h5>
                            <p>{{ $cstStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'MSC']) }}" class="card">
                        <div class="card-body">
                            <h5>MSC</h5>
                            <p>{{ $mscStudents }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.users.list', ['category' => 'course_type', 'value' => 'PHD']) }}" class="card">
                        <div class="card-body">
                            <h5>PHD</h5>
                            <p>{{ $phdStudents }}</p>
                        </div>
                    </a>
                </div>
            </div>

            <script>
                function toggleMenu(menuId) {
                    const menu = document.getElementById(menuId);
                    if (menu.style.display === 'block') {
                        menu.style.display = 'none';
                    } else {
                        menu.style.display = 'block';
                    }
                }
            </script>
@endsection

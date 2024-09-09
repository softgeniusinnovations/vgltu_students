<style>
    /* Sidebar styling */
    .sidebar {
        background-color: #333;
        height: 100vh;
        color: white;
        padding: 10px;
        position: fixed;
        width: 200px;
    }
    .sidebar h4 {
        color: #fff;
        padding: 10px 0;
    }
    .nav-item {
        padding: 5px 0;
    }
    .nav-link {
        color: white;
        display: block;
        padding: 10px;
        text-decoration: none;
    }
    .nav-link:hover {
        background-color: #444;
    }
    .dropdown-menu {
        display: none;
        background-color: #444;
        padding: 0;
    }
    .dropdown-menu .nav-link {
        padding-left: 20px;
    }
    .nav-item:hover .dropdown-menu {
        display: block;
    }

    /* Dashboard content styling */
    .content {
        margin-left: 220px;
        padding: 20px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }
    .card {
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 15px;
        margin-bottom: 20px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
    }
    .card:hover {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    /* Media Queries */
    @media (max-width: 768px) {
        .sidebar {
            height: auto;
            width: 100%;
            position: relative;
        }
        .content {
            margin-left: 0;
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
                    <a class="nav-link" href="#">Students by Nationality</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'nationality', 'value' => 'Bangladeshi']) }}">Bangladeshi</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'nationality', 'value' => 'Indian']) }}">Indian</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'nationality', 'value' => 'Nepali']) }}">Nepali</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Students by Religion</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Muslim']) }}">Muslim</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Hindu']) }}">Hindu</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Boddho']) }}">Boddho</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'religion', 'value' => 'Christian']) }}">Christian</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Students by Department</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Language']) }}">Language</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Automobile']) }}">Automobile</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Forestry']) }}">Forestry</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Mechanical']) }}">Mechanical</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Computer Science and Technology']) }}">Computer Science and Technology</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'department', 'value' => 'Economics']) }}">Economics</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Students by Course</a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course', 'value' => 'Language']) }}">Language</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course', 'value' => 'BSC']) }}">BSC</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course', 'value' => 'MSC']) }}">MSC</a></li>
                        <li><a class="nav-link" href="{{ route('admin.users.list', ['category' => 'course', 'value' => 'PHD']) }}">PHD</a></li>
                    </ul>
                </li>
            </ul>
        </div>
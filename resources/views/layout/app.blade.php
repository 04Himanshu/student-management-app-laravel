<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StudentHub')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div class="app-shell">

        <aside class="sidebar">
            <a href="{{ route('students.index') }}" class="brand">
                <span class="brand-icon"><i class="bi bi-mortarboard-fill"></i></span>
                <span>Student<span class="brand-light">Hub</span></span>
            </a>

            <p class="sidebar-label">MAIN MENU</p>

            <a href="{{ route('students.index') }}"
                class="sidebar-link {{ request()->routeIs('students.index') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('students.create') }}"
                class="sidebar-link {{ request()->routeIs('students.create') ? 'active' : '' }}">
                <i class="bi bi-person-plus-fill"></i>
                <span>Add Student</span>
            </a>

            <div class="sidebar-bottom">
                <div class="help-card">
                    <i class="bi bi-lightbulb-fill"></i>
                    <h6>StudentHub</h6>
                    <p>Manage your student records in one place.</p>
                </div>
                <small>Student Management System</small>
            </div>
        </aside>

        <main class="main-area">
            <header class="topbar">
                <div>
                    <p class="eyebrow mb-1">STUDENT MANAGEMENT</p>
                    <h5 class="mb-0">@yield('page-heading', 'Dashboard')</h5>
                </div>

                <div class="topbar-profile">
                    <div class="profile-avatar">A</div>
                    <div class="d-none d-sm-block">
                        <strong>Administrator</strong>
                        <small>Manage your students</small>
                    </div>
                </div>
            </header>

            <section class="page-content">
                @yield('content')
            </section>

            <footer class="page-footer">
                StudentHub <span>·</span> Built with Laravel
            </footer>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
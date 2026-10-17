<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Point of Sale' }} | POS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="site-canvas">
        <header class="nav-capsule-wrapper">
            <nav class="nav-capsule" aria-label="Primary Navigation">
                <a href="{{ route('home') }}" class="nav-brand">POS</a>
                <div class="nav-divider" aria-hidden="true"></div>
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'is-active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item {{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
                    <a href="{{ route('customers.index') }}" class="nav-item {{ request()->routeIs('customers.index') ? 'is-active' : '' }}">Customers</a>
                    <a href="{{ route('users.index') }}" class="nav-item {{ request()->routeIs('users.index') ? 'is-active' : '' }}">Users</a>
                </div>
            </nav>
        </header>

        <main class="content-stage">
            @yield('content')
        </main>
    </div>
</body>
</html>

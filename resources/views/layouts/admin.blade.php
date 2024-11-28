
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-layout">
        <div class="admin-navbar">
            @include('components.adminNavbar')
        </div>
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
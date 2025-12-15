<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title','Simple Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Simple Blog</a>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="/logout">@csrf
                        <button class="btn btn-sm btn-danger">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>


</body>

</html>
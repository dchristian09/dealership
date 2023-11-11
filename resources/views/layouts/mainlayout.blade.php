<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/style.css">

    <title>@yield("page_title")</title>
</head>

<body class="bg-dark text-white">
    {{-- NAVIGATION --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="/customer">UC Dealership</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ $active_customer ?? '' }}" href="/customer">Customer</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ $active_vehicle ?? '' }}" href="/vehicle">Vehicle</a>
            </li>
          </ul>
        </div>
    </nav>
    {{-- END OF NAVIGATION --}}
    
    @yield('main_content')

</body>


</html>
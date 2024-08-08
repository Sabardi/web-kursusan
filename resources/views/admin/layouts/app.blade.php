<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>course Ardi</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    @include('admin.layouts.css')
</head>

<body>
    <div class="wrapper">
        @include('sweetalert::alert')
        @include('admin.layouts.sidebar')
        <div class="main-panel">
            @include('admin.layouts.main')
            @yield('content')

            @include('admin.layouts.footer')
        </div>
    </div>

    @include('admin.layouts.setting')
    @include('admin.layouts.js')
</body>

</html>

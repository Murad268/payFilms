<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">


        </nav>

        <x-admin-header-component />

        <div class="content-wrapper">

        @yield('content')

        </div>


        <x-admin-footer-component />

    </div>

</body>

</html>

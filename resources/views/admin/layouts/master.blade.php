<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin/layouts/_head')
</head>

<body class="">
<div class="wrapper ">
    {{--Main Navbar--}}
    @include('admin/layouts/_main_nav')
    {{--Main Navbar--}}
    <div class="main-panel">
        <!-- Navbar -->
        @include('admin/layouts/_top_nav')

        <!-- End Navbar -->
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if(session()->has('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="footer">
            @include('admin/layouts/_footer')

        </footer>
    </div>
</div>

</body>

</html>

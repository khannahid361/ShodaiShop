@include('includes.head')

<body>
    <div class="container-fluid">

        <div class="row min-vh-100">
            <div class="col-12">
                @include('includes.navbar')
            </div>
            @yield('content')
            @include('includes.footer')

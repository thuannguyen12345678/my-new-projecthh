



@include('admin.layouts.products.header')
        <div id="layoutSidenav">
           @include('admin.layouts.products.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    

                    @yield('content')
                
                </main>
                @include('admin.layouts.products.footer')

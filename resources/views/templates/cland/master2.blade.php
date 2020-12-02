@include('templates.cland.header')
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@include('templates.cland.footer')
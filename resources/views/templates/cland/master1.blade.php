@include('templates.cland.header1')
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                @widget('leftbarWidget')
                @yield('content')
            </div>
        </div>
    </section>
    @yield('comm')
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
@include('templates.cland.footer')
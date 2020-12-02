@include('templates.admin.header')
<div class="page-content">
    <div class="row">
    @include('templates.admin.sidebar')
    @yield('content')
    </div>
</div>
    @include('templates.admin.footer')
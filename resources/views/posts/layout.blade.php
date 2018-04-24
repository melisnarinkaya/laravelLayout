@include('posts.top')
@include('posts.nav')

@if ($flash=session('message'))
<div id='flash-message' class="alert alert-success" role="alert">
    {{$flash}}
</div>
@endif

@include('posts.header')


<div class="container">

    <div class="row">

    @yield('content')

    <!-- sidebar --->
    @include('posts.sidebar')
    <!-- sidebar sonu --->

    </div>
</div>

@include('posts.footer')




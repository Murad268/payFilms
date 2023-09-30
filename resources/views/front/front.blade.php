@include('front.includes.head')
@section('title', "peroPlay")

<body style="{{ !Cookie::has('email') ? 'background-color: #1C1F28;' : '' }}">

    @if(Cookie::has('email'))
    <x-front-header-component />

    @endif

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="{{asset('assets/front/img/preloader.svg')}}" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->

    @yield('content')



    <!-- footer-area -->
    <x-front-footer-component />

    @include('front.includes.foot')


</body>

</html>

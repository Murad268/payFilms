@include('front.includes.head')

<body>
    <x-front-header-component />

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

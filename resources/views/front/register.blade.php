@extends('front.front')

@section('content')
<main>

    <!-- movie-area -->
    <section class="movie-area movie-bg pb-1" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">
            <div class="row tr-movie-active">
                <div class="col-xl-12 col-lg-12 col-sm-12 grid-item grid-sizer cat-one cat-two my-5">
                    <section class="login-section">
                        <div class="imgBx">
                            <img src="{{asset('assets/front/img/loginphoto.jpg')}}" alt="Login background image">
                        </div>
                        <div class="contentBx">
                            <form action="{{route('front.register_сheck')}}" class="formBx">
                                @method('post')
                                <h2>Xoş gəldin!</h2>
                                <div action="#" method="post">
                                    <div class="inputBx">
                                        <span>Ad Soyad</span>
                                        <input type="text" value="{{old('name')}}" name="name" id="register-name">
                                        @error("name")
                                        <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="inputBx">
                                        <span>Mobil</span>
                                        <input type="text" value="{{old('phone')}}" name="phone" id="register-phone">
                                        @error("phone")
                                        <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Username input -->
                                    <div class="inputBx">
                                        <span>E-poçt ünvanı</span>
                                        <input type="email" value="{{old('email')}}" name="email" id="register-email">
                                        @error("email")
                                        <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Password input -->
                                    <div class="inputBx">
                                        <span>Şifrə</span>
                                        <input type="password" name="password" id="register-password">
                                        @error("password")
                                        <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="inputBx">
                                        <span>Şifrə (təkrar)</span>
                                        <input type="password" name="passwordRepeat" id="register-passwordRepeat">
                                        @error("passwordRepeat")
                                        <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- Submit button -->
                                    @if(session()->has('message'))
                                    <div style="border-radius: 15px; background-color: #333; color: #fff; padding: 10px;" class="alert alert-danger mt-2" role="alert">
                                        {{session('message')}}
                                    </div>
                                    @endif
                                    <div class="inputBx">
                                        <input type="submit" id="register-submit" value="Qeydiyyat ol">
                                    </div>
                                    <!-- Option to sign up -->
                                    <div class="inputBx">
                                        <p>Hesabın var? <a href="{{route('front.login')}}">Daxil ol</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- movie-area-end -->

</main>
@endsection

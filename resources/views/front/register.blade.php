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
                            <div class="formBx">
                                <h2>Xoş gəldin!</h2>
                                <div action="#" method="post">
                                    <div class="inputBx">
                                        <span>Ad Soyad</span>
                                        <input type="text" name="name" id="register-name">
                                    </div>
                                    <div class="inputBx">
                                        <span>Mobil</span>
                                        <input type="text" name="phone" id="register-phone">
                                    </div>
                                    <!-- Username input -->
                                    <div class="inputBx">
                                        <span>E-poçt ünvanı</span>
                                        <input type="email" name="e-mail" id="register-email">
                                    </div>
                                    <!-- Password input -->
                                    <div class="inputBx">
                                        <span>Şifrə</span>
                                        <input type="password" name="password" id="register-password">
                                    </div>
                                    <div class="inputBx">
                                        <span>Şifrə (təkrar)</span>
                                        <input type="password" name="passwordRepeat" id="register-passwordRepeat">
                                    </div>
                                    <!-- Submit button -->
                                    <div class="spinner-container">
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="inputBx">
                                        <input type="submit" id="register-submit" value="Qeydiyyat ol">
                                    </div>
                                    <!-- Option to sign up -->
                                    <div class="inputBx">
                                        <p>Hesabın var? <a href="login.php">Daxil ol</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- movie-area-end -->

</main>
@endsection

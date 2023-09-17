<x-front-header-component />
<main>
    <!-- movie-area -->
    <section class="movie-area movie-bg pb-1" data-background="{{asset('assets/front/img/bg/movie_bg.jpg')}}">
        <div class="container">
            <div class="row tr-movie-active">
                <div class="col-xl-12 col-lg-12 col-sm-12 grid-item grid-sizer cat-one cat-two my-5">
                    <section class="login-section">
                        <div class="contentBx">
                            <div class="formBx">
                                <h2>Xoş gəldin!</h2>
                                <div>
                                    <!-- Username input -->
                                    <div class="inputBx">
                                        <span>E-poçt ünvanınız</span>
                                        <input type="email" name="email" id="login-email">
                                    </div>
                                    <!-- Password input -->
                                    <div class="inputBx">
                                        <span>Şifrəniz</span>
                                        <input type="password" name="password" id="login-password">
                                    </div>
                                    <!-- Remember Me input -->
                                    <!-- <div class="remember">
                                        <label><input type="checkbox">Remember me</label>
                                    </div> -->
                                    <!-- Submit button -->
                                    <div class="spinner-container">
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>

                                    <div class="inputBx">
                                        <input type="submit" value="Daxil ol" id="login-submit">
                                    </div>
                                    <!-- Option to sign up -->
                                    <div class="inputBx">
                                        <p>Hələ də hesabın yoxdu? <a href="register.php">Qeydiyyat ol</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="imgBx">
                            <img src="{{asset('asset/front/img/loginphoto.jpg')}}" alt="Login background image">
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <x-front-footer-component />

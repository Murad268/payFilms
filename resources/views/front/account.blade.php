<!-- main-area -->
@extends('front.front')
@section('content')
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Hesab <span>Məlumatları</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <style>
        .shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
        }

        .profile-tab-nav {
            min-width: 250px;
        }

        .tab-content {
            flex: 1;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .nav-pills a.nav-link {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            color: #333;
        }

        .nav-pills a.nav-link i {
            width: 20px;
        }

        .img-circle img {
            height: 100px;
            width: 100px;
            border-radius: 100%;
            border: 5px solid #fff;
        }

        .user_image {
            width: 200px;
            height: 200px;
            border-radius: 100%;
            overflow: hidden;
            margin-left: 25px;
            margin-bottom: -40px;
        }

        .user_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <!-- movie-area -->


    <section class="movie-area movie-bg py-5" data-background="img/bg/movie_bg.jpg">
        <div class="user_image">
            <img id="profile-image" src="{{asset('assets/front/img/avatar/'.$user->avatar)}}" alt="">
        </div>
        <div class="shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <?php

                        // if ($result['avatar'] == '') {
                        //     echo '<img src="https://t4.ftcdn.net/jpg/00/87/28/19/360_F_87281963_29bnkFXa6RQnJYWeRfrSpieagNxw1Rru.jpg" alt="Image" class="shadow">';
                        // } else {
                        //     echo '<img src="img/avatar/' . $result['avatar'] . '" alt="Image" class="shadow">';
                        // }

                        ?>
                    </div>
                </div>

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                        <i class="fa fa-home text-center mr-1"></i>
                        Hesab məlumatları
                    </a>
                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                        <i class="fa fa-key text-center mr-1"></i>
                        Güvənlik & Şifrə
                    </a>
                    <!-- <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                                    <i class="fa fa-user text-center mr-1"></i>
                                    Security
                                </a> -->
                    <!-- <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                                    <i class="fa fa-tv text-center mr-1"></i>
                                    Application
                                </a> -->
                    <a class="nav-link" id="logout-link" href="{{route('front.account.logout')}}">
                        <i class="fas fa-sign-out-alt"></i>
                        Çıxış et
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <h3 class="mb-4">Hesab məlumatları</h3>
                    <form id="account-update-form" action="{{ route('front.account.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Adınız</label>
                                    <input type="text" name="full_name" id="name" class="form-control" value="{{$user->full_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-poçt</label>
                                    <input id="email" disabled readonly type="text" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Mobil</label>
                                    <input id="phone" name="phone" type="text" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input id="avatar" name="avatar" type="file" class="form-control" />
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Bio</label>
                                            <textarea class="form-control" rows="4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore vero enim error similique quia numquam ullam corporis officia odio repellendus aperiam consequatur laudantium porro voluptatibus, itaque laboriosam veritatis voluptatum distinctio!</textarea>
                                        </div>
                                    </div> -->
                        </div>
                        <div>
                            <button class="btn">Təsdiq et</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <h3 class="mb-4">Güvənlik & Şifrə</h3>
                    <form method="post" id="password_form" action="{{route('front.account.check', $user->id)}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="oldpass">Köhnə şifrə</label>
                                    <input type="password" id="oldpass" name="oldpass" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="newpass">Yeni şifrə</label>
                                    <input type="password" id="newpass" name="newpass" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="newpassagain">Yeni şifrə (təkrar)</label>
                                    <input type="password" id="newpassagain" name="newpassagain" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn" id="update-password">Təsdiq et</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                    <h3 class="mb-4">Security Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Two-factor auth</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="recovery">
                                    <label class="form-check-label" for="recovery">
                                        Recovery
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                    <h3 class="mb-4">Application Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="app-check">
                                    <label class="form-check-label" for="app-check">
                                        App check
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Lorem ipsum dolor sit.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    <h3 class="mb-4">Notification Settings</h3>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification1">
                            <label class="form-check-label" for="notification1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification2">
                            <label class="form-check-label" for="notification2">
                                hic nesciunt repellat perferendis voluptatum totam porro eligendi.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="notification3">
                            <label class="form-check-label" for="notification3">
                                commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
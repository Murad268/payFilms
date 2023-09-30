<!-- main-area -->
@extends('front.front')

@section('content')
<style>
    /* Style for the overlay */
    #overlay {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
        z-index: 9999;
        /* Ensure it's above other content */
    }

    /* Style for the spinner */
    .spinner {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 4px solid #3498db;
        /* Color of the spinner */
        width: 40px;
        height: 40px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('assets/front/images/'.$lastPhoto->img)}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Bizimlə əlaqə</h2>
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area contact-bg" data-background="{{asset('assets/front/img/bg/contact_bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-form-wrap">
                        <div class="widget-title mb-50">
                            <h5 class="title">Bizə mesaj yaz!</h5>
                        </div>
                        <form method="post" action="{{route('front.sendmessages')}}" class="contact-form">
                            @csrf
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="name" placeholder="Adınız *" name="name" class="contact-name">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="E-poçt ünvanınız *" name="email" class="contact-email">
                                    </div>
                                </div>
                                <input type="text" placeholder="Mövzu *" id="subject" name="subject" class="contact-subject">
                                <textarea id="message" name="message" placeholder="Mesajınız..." class="contact-message"></textarea>
                                <div id="overlay" style="display: none;">
                                    <div class="spinner"></div>
                                </div>
                                <button type="submit" class="btn contact-btn">Göndər</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="widget-title mb-50">
                        <h5 class="title">Məlumat</h5>
                    </div>
                    <div class="contact-info-wrap">
                        <p><span>Məlumat:</span> Bizimlə əlaqə üçün aşağıdakı məlumatları istifadə edə bilərsiniz.</p>
                        <div class="contact-info-list">
                            <ul>
                                <li>
                                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <p><span>Ünvan:</span>{{ $settings->getTranslation('address', app()->getLocale()) }}</p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                    <p><span>Mobil:</span> {{$settings->phone}}</p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-envelope"></i></div>
                                    <p><span>Email:</span> {{$settings->email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

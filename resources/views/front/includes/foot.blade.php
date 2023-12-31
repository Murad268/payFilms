<!-- JS here -->
<script src="{{asset('assets/front/js/vendor/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.odometer.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/ajax-form.js')}}"></script>
<script src="{{asset('assets/front/js/wow.min.js')}}"></script>
<script src="{{asset('assets/front/js/aos.js')}}"></script>
<script src="{{asset('assets/front/js/plugins.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>
<!-- Notify plugin -->
<script src="https://unpkg.com/notie"></script>
<!-- Other plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@php
$baseUrl = Config::get('app.url');
@endphp

<script>
    $(document).ready(function() {
        $('.slider__main').slick({
            arrows: false,
            dots: true
        });

        let navbarUserSearch = document.querySelector('.navbar__user__search');
        if (navbarUserSearch) {
            navbarUserSearch.addEventListener('click', function() {
                let searchPanel = document.querySelector('.search__panel');
                if (searchPanel) {
                    searchPanel.classList.toggle('active');
                    document.body.classList.toggle('active');
                    let navbarUserSearchIcon = navbarUserSearch.querySelector('.fa');
                    if (navbarUserSearchIcon) {
                        navbarUserSearchIcon.classList.toggle('fa-search');
                        navbarUserSearchIcon.classList.toggle('fa-times');
                    }
                }
            });
        }

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('categories__btn')) {
                let categories = document.querySelector('.categroies');
                categories.classList.toggle('active');
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('cat_exit_times')) {
                let categories = document.querySelector('.categroies');
                categories.classList.toggle('active');
            }
        });

        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('categories__btn__mini')) {
                let categories = document.querySelector('.categroies');
                let navbar__mini = document.querySelector('.navbar__mini');
                let navbar__hamburger = document.querySelector('.navbar__hamburger');
                categories.classList.add('active');
                navbar__mini.classList.remove('active');
                navbar__hamburger.classList.remove('active');
            }
        });


        // let categoriesBtn = document.querySelector('.categories__btn');
        // if (categoriesBtn) {
        //     categoriesBtn.addEventListener('click', function() {});
        // }

        if (document.querySelector('.navbar__hamburger')) {
            document.querySelector('.navbar__hamburger').addEventListener('click', function(e) {
                let navbarHamburger = document.querySelector('.navbar__hamburger');
                let navbarMini = document.querySelector('.navbar__mini');
                if (navbarHamburger && navbarMini) {
                    navbarHamburger.classList.toggle('active');
                    navbarMini.classList.toggle('active');
                }
            });
        }


        let getData = async (url) => {
            let res = await fetch(url);
            return await res.json();
        }

        // İlk select üçün eventListener
        let seriesSelects = document.querySelectorAll('.series_det select');
        if (seriesSelects.length > 0) {
            seriesSelects.forEach(select => {
                select.addEventListener('change', () => {
                    let season = document.querySelector('.serie_movie');
                    if (season) {
                        getData(`{{$baseUrl}}/get_serie/${season.value}`).then(res => {
                            let iframeSerie = document.querySelector('.iframe_serie');
                            if (iframeSerie) {
                                iframeSerie.src = res.episode.link;
                            }
                        });
                    }
                });
            });
        }

        // İkinci select üçün ayrı eventListener
        let sezonedSelects = document.querySelectorAll('.sezoned select');
        if (sezonedSelects.length > 0) {
            sezonedSelects.forEach(select => {
                select.addEventListener('change', () => {
                    let season = document.querySelector('.details_movie');
                    if (season) {
                        getData(`{{$baseUrl}}/get_documentals/${season.value}`).then(res => {
                            let iframeSerie = document.querySelector('.iframe_documents');
                            if (iframeSerie) {
                                iframeSerie.src = res.episode.link;
                            }
                        });
                    }
                });
            });
        }







        $('#logout-link').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Xəbərdarlıq',
                text: 'Çıxış etmək istədiyinizdın əminsiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Bəli',
                cancelButtonText: 'Xeyir'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).attr('href');
                }
            });
        });


        $('#account-update-form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            // Boş giriş kontrolü
            var emptyFields = false;
            $(this).find('input[type="text"], input[type="email"]').each(function() {
                if ($(this).val() === '') {
                    emptyFields = true;
                    return false;
                }
            });

            if (emptyFields) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta',
                    text: 'Zəhmət olmasa bütün sahələri doldurun.'
                });
                return;
            }

            // AJAX isteği gönder
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Uğurlu',
                            text: response.message
                        }).then(function() {
                            $('#profile-image').attr('src', '{{asset("assets/front/img/avatar/")}}' + "/" + response.updated_user_avatar);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Xəta',
                            text: 'Xəta' + response.message
                        });
                    }
                },
                error: function() {
                    alert('Bir xəta baş verdi, xahiş edirik yenidən cəhd edin.');
                }
            });


        });


        $('#password_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var newpass = $('#newpass').val();
            var newpassagain = $('#newpassagain').val();
            var oldpass = $('#oldpass').val();
            var regex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/;
            if (newpassagain !== newpass) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: 'Şifrələr üst-üstə düşmürlər',
                });
            } else if (!newpass || !newpassagain || !oldpass) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: 'Xahiş olunur bütün sahələri doldurasınız!',
                });
            } else if (newpass.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: 'Şifrə 8 simvoldan qısadır',
                });
            } else if (!regex.test(newpass)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: 'Şifrədə mütlə bir böyük registrli hərf və bir işarə olmalıdır',
                });
            } else {
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            if (response.code == 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Xəta!',
                                    text: response.message,
                                });
                            } else if (response.code == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Uğurlu!',
                                    text: response.message,
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Xəta!',
                                text: 'Gözlənilməz xəta',
                            });
                        }
                    },
                    error: function() {
                        alert('Bir xəta baş verdi, xahiş edirik yenidən cəhd edin.');
                    }
                });
            }
        });


        $('.contact-form').on('submit', function(event) {
            event.preventDefault();

            // Show the overlay with the spinner
            $('#overlay').show();

            var formData = new FormData(this);
            var name = $('#name').val();
            var email = $('#email').val();
            var message = $('#message').val();
            var subject = $('#subject').val();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Hide the overlay when the form submission is successful
                    $('#overlay').hide();

                    Swal.fire({
                        icon: 'success',
                        title: 'Uğurlu',
                        text: 'Məktunuz uğurla göndərildi'
                    });
                },
                error: function() {
                    // Hide the overlay when there is an error
                    $('#overlay').hide();

                    alert('Bir xəta baş verdi, xahiş edirik yenidən cəhd edin.');
                }
            });

            if (!name || !email || !message || !subject) {
                Swal.fire({
                    icon: 'error',
                    title: 'Xəta!',
                    text: 'Xahiş olunur bütün sahələri doldurasınız!',
                });

                // Hide the overlay if the form is not valid
                $('#overlay').hide();
            }
        });





        const addFav = async (url) => {
            const res = await fetch(url);
            return res.text()
        }

        document.addEventListener('click', function(e) {
            let id = e.target.getAttribute('data-id');
            let type = e.target.getAttribute('type');
            if (e.target.classList.contains('fa-heart')) {
                if (e.target.classList.contains('active')) {
                    if (e.target.classList.contains('favs')) {
                        e.target.parentElement.parentElement.remove()
                    }
                    addFav(`{{$baseUrl}}/remove_cookie/${type}/${id}`).then(res => console.log(res));
                    e.target.classList.remove('active')
                } else {
                    addFav(`{{$baseUrl}}/add_cookie/${type}/${id}`).then(res => console.log(res));
                    e.target.classList.add('active')
                }
            }
        })






    });
</script>

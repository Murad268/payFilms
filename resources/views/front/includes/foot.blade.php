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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {
        // Form gönderildiğinde
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
                            text: 'Hata: ' + response.message
                        });
                    }
                },
                error: function() {
                    alert('Bir hata oluştu, lütfen tekrar deneyin.');
                }
            });
        });
    });
</script>

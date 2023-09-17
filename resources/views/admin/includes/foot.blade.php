<script src="{{asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- CKEditor 5 CDN - Classic Editor Build -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


<script src="{{asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/back/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/fullcalendar/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('assets/back/js/demo.js')}}"></script>
<script>
    var currentLocale = "{{ app()->getLocale() }}";
</script>

<script>
    $(function() {
        var currColor = '#3c8dbc'
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            currColor = $(this).css('color')
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#fff'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            ini_events(event)

            $('#new-event').val('')
        })
    })



    function deleteConfirmation(event, text = false) {
        event.preventDefault();

        Swal.fire({
            title: text ? 'Əminsiniz?' + text : 'Əminsiniz?',
            text: "Bu əməliyyat geri qaytarıla bilməz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, silin!',
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }

    function toHref(event, text = false) {
        event.preventDefault();

        Swal.fire({
            title: text ? 'Əminsiniz?' + text : 'Əminsiniz?',
            text: "Siz hesabdan çıxacaqsınız!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Bəli, çıxın!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.getAttribute('href');
            }
        });
    }



    function toHrefCat(event, text = false) {
        event.preventDefault();
        Swal.fire({
            title: text ? 'Əminsiniz?' + text : 'Əminsiniz?',
            text: "Bu kateqoriya ilə əlaqəli bütün filmlər və seriallar silinəcəkdir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, exit!',
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });;
    }





    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

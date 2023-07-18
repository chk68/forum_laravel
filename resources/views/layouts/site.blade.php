<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">






        <link rel="stylesheet" href="{{ asset('node_modules/tinymce/tinymce.css') }}">
        <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdn.tiny.cloud/1/{API_KEY}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/{API_KEY}/tinymce/5/plugins/imageupload/plugin.min.js" referrerpolicy="origin"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">--}}



    <style>
        body { padding-bottom: 100px; }
        .level { display: flex; align-items: center; }
        .flex { flex: 1; }
    </style>
</head>
<body>
<div style="min-height: 90vh;" id="app">
    @include ('layouts.nav')
    @yield('content')
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>--}}

@include('layouts.footer')
</body>

<script>
    $(document).ready(function() {
        $('.delete-channel').click(function() {
            var channelId = $(this).data('id');

            $.ajax({
                url: '/channels/' + channelId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {


                        $(`[data-id="${channelId}"]`).remove();
                    Swal.fire({
                        icon: 'success',
                        title: 'Видалено!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $(".reply-button").click(function() {
            var cardBody = $(this).closest(".card").find(".card-body").html();
            var dataId = $(this).closest(".card").find(".card-body").data("id");

            $(".reply-text").text(cardBody);
            $('#div_text').val(dataId);
        });
    });




    /*/!* // If you are using JavaScript/ECMAScript modules:
     import Dropzone from "dropzone";

     // If you are using CommonJS modules:
     //const { Dropzone } = require("dropzone");

     // If you are using an older version than Dropzone 6.0.0,
     // then you need to disabled the autoDiscover behaviour here:
     /!*Dropzone.autoDiscover = false;

     let myDropzone = new Dropzone("#my-form");
     myDropzone.on("addedfile", file => {
         console.log(`File added: ${file.name}`);
     });*!/

     Dropzone.options.dropzone =
         {
             maxFilesize: 10,
             renameFile: function (file) {
                 var dt = new Date();
                 var time = dt.getTime();
                 return time + file.name;
             },
             acceptedFiles: ".jpeg,.jpg,.png,.gif",
             addRemoveLinks: true,
             timeout: 60000,
             success: function (file, response) {
                 console.log(response);
             },
             error: function (file, response) {
                 return false;
             }
         }; */

</script>

{{--<script type="module">



//import Dropzone from "dropzone";


    Dropzone.options.dropzone =
        {
            maxFilesize: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
</script>--}}


</html>



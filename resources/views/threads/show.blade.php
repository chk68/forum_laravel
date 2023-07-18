@extends('layouts.site')

@section('content')
    <div class="container py-4" style="background-color: #d2d5d5; max-width: 100%;">
    <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="level">
                            <span class="font-weight-bold" style="font-size: 38px">{{ $thread->title }}</span>

                            @can('update', $thread)
                                <form action="{{ $thread->path() }}" method="POST" class="ml-auto delete-thread-form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm delete-thread-btn">Видалити тему</button>
                                </form>

                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('.delete-thread-btn').click(function(event) {
                                            event.preventDefault();
                                            var form = $(this).closest('.delete-thread-form');
                                            Swal.fire({
                                                title: 'Ви впевнені, що хочете видалити цю тему?',
                                                text: "Цю дію не можна буде скасувати!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#3085d6',
                                                confirmButtonText: 'Так, видалити!',
                                                cancelButtonText: 'Ні, скасувати'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    form.submit();
                                                }
                                            });
                                        });
                                    });
                                </script>

                            @endcan
                        </div>
                    </div>




                    <div class="card-body">
                        {!! html_entity_decode($thread->body) !!}
                    </div>
                </div>

                @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @if (auth()->check())
                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="div_text" id="div_text">

                        <div class="form-group mb-3">
                            <div style="background-color: #5f8fe5; border-radius: 10px;" class="reply-text"></div>
                            <textarea name="body" id="body" class="form-control" placeholder="Є що казати?" rows="5"></textarea>

                            <script>
                                tinymce.init({
                                    selector: 'textarea#body',
                                    plugins: 'image code',
                                    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code image',
                                    images_upload_url: '{{ route('images.upload') }}',
                                    images_upload_handler: function (blobInfo, success, failure) {
                                        var xhr, formData;

                                        xhr = new XMLHttpRequest();
                                        xhr.withCredentials = false;
                                        xhr.open('POST', this.images_upload_url);

                                        xhr.onload = function() {
                                            var json;

                                            if (xhr.status === 403) {
                                                failure('HTTP Error: ' + xhr.status, { remove: true });
                                                return;
                                            }

                                            if (xhr.status < 200 || xhr.status >= 300) {
                                                failure('HTTP Error: ' + xhr.status);
                                                return;
                                            }

                                            json = JSON.parse(xhr.responseText);

                                            if (!json || typeof json.location != 'string') {
                                                failure('Invalid JSON: ' + xhr.responseText);
                                                return;
                                            }

                                            success(json.location);
                                        };

                                        xhr.onerror = function () {
                                            failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                                        };

                                        formData = new FormData();
                                        formData.append('image', blobInfo.blob(), blobInfo.filename());

                                        xhr.send(formData);
                                    }
                                });
                            </script>

                        </div>

                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>

                @else
                    <p class="text-center">Пожалуйста <a href="{{ route('login') }}">войдите</a> для того чтобы учавствовать в обсуждении.</p>
                @endif

            </div>


            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">



                        <div class="card-footer">
                            <p>Автор: <a href="{{ route('user', $thread->creator) }}">{{ $thread->creator->name }}</a>.</p>
                            <p>Повідомлень: {{ $thread->replies_count }}.</p>
                        </div>
                        <div class="card-body">

                            <p>
                                Тема була створена {{ $thread->created_at->format('d-m-Y') }} о {{ $thread->created_at->format('H:i:s') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

   {{-- <div class="container">
        <h2>Laravel 6 Upload Image Using Dropzone Tutorial</h2><br/>
        <form method="post" action="{{url('dropzone/store')}}" enctype="multipart/form-data"
              class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>--}}


@endsection


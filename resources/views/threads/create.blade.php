@extends('layouts.site')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card mb-3">
                    <div class="card-header" style="text-align: center; font-weight: bold; font-size: 24px;">Додати нову Тему</div>



                    <div class="card-body">
                        <form method="POST" action="/threads">
                            {{ csrf_field() }}

                            <div class="form-group mb-3">
                                <label for="channel_id">Рубрики:</label>
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    <option value="">Виберіть одну з наступних...</option>

                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="title">Заголовок:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="body">Опис:</label>
                                <textarea name="body" id="body" class="form-control" rows="8" required>
                                    {{ old('body') }}
                                </textarea>

                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Створити</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


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


@endsection




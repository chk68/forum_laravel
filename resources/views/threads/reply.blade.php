<div class="card mb-3" style="width: auto;">
    <div class="card-header">
        <div class="level">
            <div class="flex">
                <img src="{{asset("public/image/avatar/avatar".$reply->user_id.".jpg")}}"style="max-width: 50px; border-radius:50%">
                <a href="{{ route('user', $reply->owner) }}">
                    {{ $reply->owner->name }}
                </a> : {{ $reply->created_at->diffForHumans() }}
            </div>

            <div class="d-flex justify-content-end align-items-center">

                <div class="d-flex justify-content-end align-items-center ml-3">
                    @if(Auth::check() && (Auth::user()->role == "admin" || Auth::user()->id == $reply->user_id))
                        <form method="POST" action="/replies/{{ $reply->id }}" id="delete-form">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="showSuccessMessage()">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @endif

                    <button class="btn btn-primary btn-sm ml-2 reply-button" style="border-radius: 20px;"
                            data-toggle="modal" data-target="#reply-modal" data-parent-id="{{ $reply->id }}">
                        <i class="bi bi-reply"></i>
                    </button>
                </div>

                <script>
                    function showSuccessMessage() {
                        // Показуємо повідомлення "Успішно видалено" за допомогою alert або Swal.fire
                         Swal.fire('Успішно видалено');
                    }
                </script>


                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-light" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        <i class="bi bi-star-fill" style="color: #c9302c"></i>
                        {{ $reply->favorites_count }}
                    </button>
                </form>


            </div>
        </div>
    </div>
    <div style="background-color: #d2d5d5; font-style: italic;" id="reply-{{ $reply->id }}" class="card mb-1">
        @if($reply->reply()!="")
            <div style="background-color:  #5f8fe5; padding: 10px;">
                <div style="font-size: 12px;">
                    <i class="fa fa-reply"></i> Написано {{ $reply->reply()->created_at->diffForHumans() }} користувачем
                    <a href="{{ route('user', $reply->reply()->owner) }}" style="color: black">{{ $reply->reply()->owner->name }}</a>
                </div>

                <div style="font-style: italic;">
                    {!! nl2br(html_entity_decode($reply->reply()->body)) !!}
                </div>
            </div>
        @endif
    </div>


    <div class="card-body" data-id={{$reply->id}}>
        {!! html_entity_decode($reply->body) !!}
    </div>

</div>

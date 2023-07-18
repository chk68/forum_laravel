@extends('layouts.site')

@section('content')
    <h1>Результат пошуку для: "{{ $query }}"</h1>

    @if($threads->count())
        @foreach($threads as $thread)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="level">
                        <div class="flex lead">
                            <a href="{{ $thread->path() }}">
                                @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                    <strong>{{ $thread->title }}</strong>
                                @else
                                    {{ $thread->title }}
                                @endif
                            </a>
                            @if (isset($thread->channel))
                                <span style="color: gray; font-size: small;">&nbsp;({{ $thread->channel->name }})</span>
                            @endif
                        </div>


                        <a href="{{ $thread->path() }}">
                            {{ $thread->replies_count }} {{ $thread->replies_count == 1 ? 'Повідомлення' : 'Повідомлень' }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    {{ mb_strlen(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body))) > 150 ? mb_substr(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)), 0, 150) . '...' : str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)) }}
                </div>
            </div>
        @endforeach

        {{ $threads->appends(request()->query())->links() }}
    @else
        <p>Нічого не знайдено</p>
    @endif
@endsection

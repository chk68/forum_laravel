@extends('layouts.site')

@section('content')

    <div class="main-body-channels">
        <div class="container py-4 h-100">
            <div class="row h-100">
                <div class="col-md-4 col-4 mb-3 h-100 d-flex justify-content-start">
                    <div style="width: 250px; height: 300px;">
                    <div class="card h-100" style="border-radius: 10px;">
                            <div style="border-bottom: 1px solid black;" class="card-header text-center">
                                <h2 class="font-weight-bold d-flex align-items-center">
                                    <img src="{{ asset('images/vw-logo.png') }}" alt="Volkswagen logo" class="mr-2 img-fluid" width="50">
                                    <span class="pr-0" style="max-width: 200px; word-wrap: break-word; overflow: hidden;">{{ $channel->name }}</span>
                                </h2>
                            </div>


                        <ul class="list-group list-group-flush">
                                @forelse($channel->threads as $thread)
                                    <li class="list-group-item">
                                        <a href="{{ $thread->path() }}" style="color: black">{{ $thread->title }}</a>
                                    </li>
                                @empty
                                    <li class="list-group-item">Поки що тут пусто...</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-8 col-8 h-100">
                    <div class="card mb-3 h-100">
                        <div class="card-header text-center" style="border-bottom: 1px solid black;">
                            <h2>Теми у цій рубриці</h2>
                        </div>


                        <div class="card-body">
                            @foreach($channel->threads as $thread)
                                <div class="card-themes mb-3 w-100">
                                    <div class="card-header bg-white" style="border: none; border-bottom: 1px solid #ccc;">
                                        <h2 style="border: none; font-size: 26px;">{{ $thread->title }}</h2>
                                        <span style="color: gray;">&nbsp;<i class="fa fa-angle-double-up"></i>
            {{ mb_strlen(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body))) > 350 ? mb_substr(str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)), 0, 350) . '...' : str_replace(['&nbsp;', '&mdash;'], ' ', strip_tags($thread->body)) }}
        </span>
                                    </div>
                                </div>



                            @endforeach

                            @if(count($channel->threads) === 0)
                                <div class="card mb-3 w-100">
                                    <div class="card-header">
                                        <h2>Поки що тут пусто...</h2>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

<style>

    .main-body-channels {
        background-color: #d2d5d5;
    }

    .card-body img {
        display: none;
    }

    .card-body {
        overflow: auto;
    }

</style>


@extends('layouts.site')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-md-center">


            <div class="card mb-3 border-0">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <img class="avatar" src="{{ asset('public/image/avatar/avatar'.$profileUser->id.'.jpg') }}" alt="Avatar">
                </div>
                <h1 class="text-center">{{ $profileUser->name }}</h1>
                <small class="text-muted d-block text-center">Профіль було створено {{ $profileUser->created_at->format('d-m-Y') }} в {{ $profileUser->created_at->format('H:i:s') }}</small>
            </div>



            <div class="col-md-8 col-md-offset-2 text-center">
                <a href="#collapse-activities" class="btn btn-primary mb-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapse-activities">
                    Показати/Сховати активності
                </a>
                <div class="collapse" id="collapse-activities">
                    @foreach ($activities as $date => $activity)
                        <div class="pt-3 mb-4 border-bottom">
                            <h4>{{ $date }}</h4>
                        </div>
                        @foreach ($activity as $record)
                            @if (view()->exists("activities.{$record->type}"))
                                @include ("activities.{$record->type}", ['activity' => $record])
                            @endif
                        @endforeach
                    @endforeach
                </div>

                @if(Auth::check() && Auth::user()->role == "admin")
                <div>
                    <form method="POST" action="/user/{{$profileUser->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
                @endif


            </div>

        </div>

    </div>
@endsection

<style>
    .avatar {
        width: 80px;
        height: 80px;
        object-fit: cover;
        object-position: center;
        border-radius: 50%;
        margin-bottom: 0;
    }
</style>

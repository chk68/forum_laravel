@component('activities.activity')
    @slot('heading')
        <span class="flex">
	        {{ $profileUser->name }} опубликовал
	        @if ($activity->subject)
                <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
            @endif

        </span>
        @if($activity->subject)
            <span>{{ $activity->subject->created_at->format('d-m-Y | H:i:s') }}</span>
        @endif

    @endslot

    @slot('body')
        @if(isset($activity->subject))
            {{ strip_tags($activity->subject->body) }}
        @endif

    @endslot
@endcomponent

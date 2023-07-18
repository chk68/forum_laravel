@component('activities.activity')
    @slot('heading')
        <span class="flex">

	        {{ $profileUser->name }} ответил в
	       @if ($activity->subject && $activity->subject->thread)
                <a href="{{ $activity->subject->thread->path() }}">"{{ $activity->subject->thread->title }}"</a>
            @endif

        </span>
        <span>{{ $activity->subject ? $activity->subject->created_at->format('d-m-Y | H:i:s') : 'Unknown' }}</span>
    @endslot

    @slot('body')
        {!! $activity->subject ? preg_replace('/<img[^>]+>/', '[Зображення]',html_entity_decode($activity->subject->body)) : 'Тема видалена' !!}
    @endslot

@endcomponent

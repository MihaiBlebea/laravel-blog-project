<div class="timeline">
    @foreach($jobs as $index => $job)
        @if($index % 2 == 0)
            <div class="timeline__container left">
                <div class="timeline__content">
                    @include('partials.timeline._career-job')
                </div>
            </div>
        @else
            <div class="timeline__container right">
                <div class="timeline__content">
                    @include('partials.timeline._career-job')
                </div>
            </div>
        @endif
    @endforeach
</div>

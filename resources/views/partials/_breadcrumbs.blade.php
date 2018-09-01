<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @if(isset($breadcrumbs))
            @foreach($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item text-capitalize">
                    @if($loop->last == false)
                        <a href="{{ url($breadcrumb['url']) }}">{{ $breadcrumb['name'] }}</a>
                    @else
                        {{ $breadcrumb['name'] }}
                    @endif
                </li>
            @endforeach
        @endif
    </ol>
</nav>

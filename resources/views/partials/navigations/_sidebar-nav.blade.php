<!-- $sidebar_nav is passed from the ViewComposerServiceProvider -->
<div class="nav flex-column nav-pills">
    @foreach($sidebar_nav as $index => $item)

        @hasAnyRole($item['roles'])

                <a class="nav-link text-capitalize {{ (Request::path() == $item['slug']) ? 'active' : '' }}"
                   href="{{ route( $item['route'], $item['params'] ) }}">
                        <strong>{{ $item['name'] }}</strong>
                </a>

        @endhasAnyRole

    @endforeach
</div>

<div class="nav flex-column nav-pills">
    @foreach($nav as $item)
        <a class="nav-link text-capitalize {{ (Request::segment(2) == $item['name']) ? 'active' : '' }}"
           href="{{ route( $item['route'] ) }}">{{ $item['name'] }}</a>
    @endforeach
</div>

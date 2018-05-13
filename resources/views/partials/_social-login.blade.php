<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="mr-1" href="{{ route('socialite.auth', [ 'driver_name' => 'linkedin' ]) }}">
            <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-lg fa-linkedin"></i> Login</button>
        </a>
    </li>
    <li class="nav-item">
        <a class="mr-1" href="{{ route('socialite.auth', [ 'driver_name' => 'github' ]) }}">
            <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-lg fa-github"></i> Login</button>
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="media">
            <div class="mini-featured-image mr-3" style="background-image: url('{{ public_upload_path() }}');"></div>
            <div class="media-body">
                <h5 class="mt-0">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <p>
                    <!-- Add content -->
                </p>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="profile-image-wrapper mb-2 mr-3" style="background-image: url('{{ public_upload_path($user->profile_image) }}');"></div>
    </div>
    <div class="col-md-8">
        <strong>{{ $user->profile->short_description }}</strong>
    </div>
</div>
<div class="row">
    <div class="col">

        @include('partials._social-buttons');
        
    </div>
</div>
<hr>

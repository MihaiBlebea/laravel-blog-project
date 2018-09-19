<div class="row">

    @foreach($languages as $language)

        <div class="col-md-6">
            <div class="mt-5">
                <p><strong>{{ $language->name }}:</strong> {{ $language->experience_years }} years of exp.</p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                         role="progressbar"
                         aria-valuenow="{{ $language->percentage }}"
                         aria-valuemin="0"
                         aria-valuemax="100"
                         style="width: {{ $language->percentage }}%"></div>
                </div>
            </div>
        </div>

    @endforeach

</div>

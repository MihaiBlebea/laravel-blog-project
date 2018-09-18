<h2>{{ $job->position }}</h2>
<p class="mb-1">
    {{ \Carbon\Carbon::parse($job->start_date)->format('M Y') }} -
    {{ \Carbon\Carbon::parse($job->end_date)->format('M Y') }}
</p>
<p class="mb-1">Company: <strong>{{ $job->company_name }}</strong></p>
<p class="mb-1">{{ $job->description }}</p>

@if(isset($editable) && $editable === true)
<hr />
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link py-0" href="{{ route('job.update', [ 'job' => $job->id ]) }}">Edit</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger py-0" href="{{ route('job.delete', [ 'job' => $job->id ]) }}">Delete</a>
    </li>
</ul>
@endif

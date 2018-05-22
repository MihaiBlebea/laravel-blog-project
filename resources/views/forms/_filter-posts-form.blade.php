<p>
    <a data-toggle="collapse" href="#toggleFilter" role="button" aria-expanded="false" aria-controls="toggleFilter">Filter</a>
    <span class="float-right">
        {{ isset($status) ? $status . ' |' : '' }}
        {{ isset($category) ? $category->name . ' |' : '' }}

        @if(isset($status) or isset($category))
            <a class="text-danger" href="{{ route('post.index') }}">Reset</a></span>
        @endif
</p>
<div class="row">
    <div class="col">
        <div class="collapse mb-3" id="toggleFilter">

            <form action="{{ route('post.index') }}" method="GET">

                <div class="row align-items-end">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose category</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select status</label>
                            <select class="form-control" name="status">
                                <option value="all" selected>All</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <button role="submit" class="btn btn-block btn-primary">Filter</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>

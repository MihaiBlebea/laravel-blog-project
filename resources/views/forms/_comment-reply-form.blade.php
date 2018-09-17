<input type="hidden" name="post_id" value="{{ $post->id }}">

<input type="hidden" name="parent_id" value="{{ isset($comment) ? $comment->id : null }}">

<div class="form-group">
    <label>Subject</label>
    <input type="text"
           name="subject"
           class="form-control"
           placeholder="Subject">
</div>

<div class="form-group">
    <label>Your comment body</label>
    <textarea class="form-control" name="content" rows="4"></textarea>
</div>

<div class="mt-5">
    @include('partials._form-button', [
        'cta' => 'Post',
        'class' => 'btn-outline-primary'
    ])
</div>

<input type="hidden" name="post_id" value="{{ $post->id }}">

<input type="hidden" name="parent_id" value="{{ isset($comment) ? $comment->id : null }}">

<div class="form-group">
    <label for="subject">Subject</label>
    <input type="text"
           name="subject"
           class="form-control"
           id="subject"
           aria-describedby="subject"
           placeholder="Subject">
</div>

<div class="form-group">
    <label for="content">Example textarea</label>
    <textarea class="form-control" name="content" id="content" rows="4"></textarea>
</div>

<button type="submit" class="btn btn-outline-primary">Post</button>

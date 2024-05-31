@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group mt-2">
                @if(auth()->check())

                    <input type="submit" class="btn btn-success" value="Reply" />
                @else

                    <input type="submit" class="btn btn-secondary" value="Reply" disabled />
                    <p>Silakan login untuk membalas komentar.</p>
                @endif
            </div>
            <hr />
        </form>
        @include('post.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach

<script>

    function isUserLoggedIn() {
        return @json(auth()->check());
    }


    function getUserId() {
        return isUserLoggedIn() ? @json(auth()->id()) : null;
    }


    if (isUserLoggedIn()) {
        console.log('Pengguna sudah login. ID:', getUserId());
    } else {
        console.log('Pengguna belum login.');
    }
</script>

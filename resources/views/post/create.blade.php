@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Post</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('posts.store') }}">
                            <div class="form-group mb-2">
                                @csrf
                                <label class="label">Post Title: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Post Body: </label>
                                <textarea style="resize:none" name="body" rows="4" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group text-center mt-2">
                                @if(auth()->check())

                                    <input type="submit" class="btn btn-success" value="Save Post" />
                                @else

                                    <input type="submit" class="btn btn-secondary" value="Save Post" disabled />
                                    <p>Silakan login untuk membuat post.</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

    function isUserLoggedIn() {
        return @json(auth()->check());
    }


    function getUserId() {
        return isUserLoggedIn() ? @json(auth()->id()) : null;
    }

    if (isUserLoggedIn()) {
        console.log('Pengguna sudah login. ID:' + getUserId());
    } else {
        console.log('Pengguna belum login.');
    }
</script>

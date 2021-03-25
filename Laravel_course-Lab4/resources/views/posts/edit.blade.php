@extends("layouts.app")

@section("content")
    <dev class="row">
        @if($errors->any())
            @include('layouts.includes._errors')
        @endif
        <div class="col-md-8  mx-auto">
            <form action="{{ route("posts.update", $post->slug) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="post_creator">Post creator</label>
                    <select name="post_creator" id="post_creator" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ ($post->post_creator == $user->id)? "selected" : "" }}>{{ ucfirst($user->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-info" type="submit">Update</button>
                </div>
            </form>
        </div>
    </dev>
@endsection


@extends("layouts.app")

@section("content")
    <dev class="row mt-5 text-center">
        <div class="col-md-12 mb-3">
            <a href="{{ route("posts.create") }}" class="btn btn-success"> New Post</a>
        </div>
        <div class="col-md-12 mx-auto">
            <table class="table table-striped">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $index => $post)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td> {{ $post->title }} </td>
                    <td> {{ $post->user->name }} </td>
                    <td> {{ $post->slug }}</td>
                    <td> {{ $post->created_at->diffForHumans()}} </td>

                    <td>
                        <a href="{{ route("posts.show", $post->slug) }}" class="btn btn-info">Show</a>
                        <a href="{{ route("posts.edit", $post->slug) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route("posts.destroy", $post->slug) }}"  method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger deletePost">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </dev>
    <div class="row">
        <div class="col-md-3 m-auto">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{ $posts->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection


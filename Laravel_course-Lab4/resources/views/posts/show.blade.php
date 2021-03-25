@extends("layouts.app")

@section("content")
    <dev class="row">
        <div class="col-md-8  mx-auto">
            <table class="table table-striped mt-5">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </dev>
@endsection


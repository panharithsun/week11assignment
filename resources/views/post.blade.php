@extends('index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category ID</th>
                            <th>
                                @if(Auth::user()->role === "admin") 
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary">+ (New)</a>
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->category_id }}</td>
                                <td>
                                    @if(Auth::user()->role === "admin")
                                        <ul class="d-flex list-inline">
                                            <li>
                                                <a class="btn btn-primary mr-2" href="{{ route('posts.editPage', $post->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
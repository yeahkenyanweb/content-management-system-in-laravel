@extends('layouts.main')

@section('title', 'Trashed Posts')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-danger"><i class="fa fa-trash"></i> Trashed Posts</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($trashedPosts->isEmpty())
            <div class="alert alert-info">No trashed posts found.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trashedPosts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <form action="{{ route('posts.restore', $post->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success">

                                    <i class="fa fa-undo"></i>
                                    Restore
                                </button>
                            </form>


                            <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete permanently?')">
                                    <i class="fa fa-times"></i> Delete Permanently
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@extends('layouts.main')

@section('title', 'Trashed Comments')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-danger"><i class="fa fa-trash"></i> Trashed Comments</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($trashedComments->isEmpty())
            <div class="alert alert-info">No trashed comments found.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>body</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trashedComments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>{{ $comment->deleted_at->diffForHumans()}}</td>
                        <td>
                            <form action="{{ route('comments.restore', $comment->id) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success">

                                    <i class="fa fa-undo"></i>
                                    Restore
                                </button>
                            </form>


                            <form action="{{ route('comments.forceDelete', $comment->id) }}" method="POST" class="d-inline">
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

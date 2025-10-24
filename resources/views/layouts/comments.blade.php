@extends('layouts.main')
@section('content')
    <h3> Comments</h3>
    <a href="{{ route('comments.trash') }}" class="btn btn-outline-danger mb-3">
        <i class="fa fa-trash"></i> View Trash
    </a>

    <table class="table table-light" id='commentsTable'>
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
            <tr>
                <td> {{ $comment->id }} </td>
                <td> {{ $comment->title }} </td>
                <td> {!! \Illuminate\Support\Str::words(strip_tags($comment->body), 6, '...') !!}
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-success"><i class="fas fa-eye"
                                                                                                  aria-hidden="true"></i> view</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"
                                                                            aria-hidden="true"></i> Delete</button>
                        </form>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-info"><i class="fas fa-edit"
                                                                                               aria-hidden="true"></i> Edit</a>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection

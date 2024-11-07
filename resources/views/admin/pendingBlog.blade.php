@extends('layouts.app') 

@section('content')
<div class="container">
    <h1>Pending Blogs</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingBlogs as $blog)
                <tr>
                    <td>
                        <a href="{{ route('posts.show', $blog->id) }}">{{ $blog->title }}</a> <!-- Link to view the blog -->
                    </td>
                    <td>
                        <form action="{{ route('admin.approveBlog', $blog->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-success">Approve</button>
                        </form>

                        <!-- Reject Button triggers a modal to input the rejection reason -->
                        <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal{{ $blog->id }}">Reject</button>

                        <!-- Rejection Modal -->
                        <div class="modal fade" id="rejectModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Reject Blog</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.rejectBlog', $blog->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="rejection_reason">Reason for Rejection:</label>
                                            <textarea name="rejection_reason" class="form-control" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Reject Blog</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('back.layouts.app')
@section('title', 'Dashboard')
@section('content')
<style>
    .mb-question {
        margin-bottom: 33px;
    }
</style>

<div class="page-content">
    <x-success-status class="mb-4" :status="session('message')"  />
    <x-validation-errors class="mb-4" :errors="$errors"  />
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Comment List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Feedback Item</th>
                                    <th>Content</th>
                                    <th>Is Enabled</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ isset($comment->user->name) ? $comment->user->name : "N/A" }}</td>
                                        <td>{{ isset($comment->feedback->title) ? $comment->feedback->title : "N/A" }}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->is_enabled ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <form method="POST" action="{{ route('back.comments_toggle', $comment) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning">
                                                        @if ($comment->is_enabled)
                                                            Disable
                                                        @else
                                                            Enable
                                                        @endif
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('back.comments_destroy', $comment) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection

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
                    <h4 class="mb-sm-0 font-size-18">Feedback List</h4>
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbackItems as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form method="POST" class="ml-2" action="{{ route('back.feedback_destroy', $item) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</button>
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

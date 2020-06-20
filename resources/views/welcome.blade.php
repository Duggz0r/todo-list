@extends('app')

@section('content')

    <div class="row text-center">
        <div class="col-md-4">
            <a href="{{ route('current-tasks') }}" class="btn btn-block btn-lg btn-primary p-5">
                <i class="fa fa-folder-open" style="font-size: 50px;"></i>
                <h5>Current Tasks</h5>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('archived-tasks') }}" class="btn btn-block btn-lg btn-secondary p-5">
                <i class="fa fa-archive" style="font-size: 50px;"></i>
                <h5>Archived Tasks</h5>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('create') }}" class="btn btn-block btn-lg btn-outline-primary p-5">
                <i class="fa fa-plus" style="font-size: 50px;"></i>
                <h5>Create Task</h5>
            </a>
        </div>
    </div>

@endsection

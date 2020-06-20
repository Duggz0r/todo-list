@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Current Tasks</h3>
        </div>
    </div>
    <div id="app">
        <table-draggable :categories="{{ $categories }}" :tasks="{{ $currentTasks }}"></table-draggable>
    </div>

@endsection

@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Create Task</h3>
        </div>
    </div>

    <form
        action="{{ $task ? route('edit-save', $task->id) : route('create-task') }}"
        method="post"
        role="form"
    >
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="title">Title</label>

            <input name="title" id="title" class="form-control mb-3" required value="{{ $task ? $task->title : '' }}">

            <label for="description">Description</label>

            <input name="description" id="description" class="form-control mb-3" required
                   value="{{ $task ? $task->description : '' }}">

            <label for="category">Category</label>

            <select name="category" id="category" class="form-control mb-3" required>
                <option value="" disabled hidden>Select category</option>
                @foreach($categories as $category)
                    @if($task && $task->category_id == $category->id)
                        <option
                            value="{{ $category->id }}" selected>{{ $category->title }}</option>
                    @else
                        <option
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @endforeach
            </select>

            <label for="datefield">Due date</label>

            <input type="datetime-local" id="datefield" name="datefield" class="form-control mb-3"
                   name="meeting-time"
                   value="{{ $task ? date('Y-m-d\TH:i', strtotime($task->due_date)) : $minDate . 'T' . $minTime }}"
                   min="{{ $task ? date('Y-m-d\TH:i', strtotime($task->due_date)) : $minDate . 'T' . $minTime }}"
                   max="2022-06-14T00:00" required>

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            @if($task)
                <a href="{{ route('archive', $task->id) }}" class="btn btn-secondary">
                    @if($task->archive == true)
                        De-archive Task
                    @else
                        Archive Task
                    @endif
                </a>
            @endif
        </div>
    </form>

@endsection
